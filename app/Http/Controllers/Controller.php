<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $data = [];
    protected $cacheFolder = 'rajaongkir_cache/';

    protected $rajaOngkirApiKey;
    protected $rajaOngkirBaseUrl;
    protected $rajaOngkirOrigin;

    protected $couriers = [
        'jne' => 'JNE',
        'jnt' => 'JNT'
    ];

    protected $provinces = [];

    public function __construct()
    {
        $this->rajaOngkirApiKey = config('ongkir.api_key');
        $this->rajaOngkirBaseUrl = config('ongkir.base_url');
        $this->rajaOngkirOrigin = config('ongkir.origin');
    }

    /**
     * Raja Ongkir Request (Shipping Cost Calculation)
     *
     * @param string $resource resource URL
     * @param array $params parameters
     * @param string $method HTTP method (GET/POST)
     * @return array
     */
    protected function rajaOngkirRequest($resource, $params = [], $method = 'GET')
    {
        $client = new Client();

        $headers = ['key' => $this->rajaOngkirApiKey];
        $requestParams = ['headers' => $headers];

        $url = $this->rajaOngkirBaseUrl . $resource;

        if (!empty($params)) {
            if ($method === 'POST') {
                $requestParams['form_params'] = $params;
            } elseif ($method === 'GET') {
                $query = http_build_query($params);
                $url .= '?' . $query;
            }
        }

        try {
            $response = $client->request($method, $url, $requestParams);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error("RajaOngkir API error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Get provinces
     *
     * @return array
     */
    protected function getProvinces()
    {
        $fileName = 'provinces.json';
        $filePath = $this->cacheFolder . $fileName;

        if (!Storage::disk('local')->exists($filePath)) {
            $response = $this->rajaOngkirRequest('province');
            $provinceData = $response['rajaongkir']['results'] ?? [];
            Storage::disk('local')->put($filePath, json_encode($provinceData));
        }

        $provinceJson = Storage::get($filePath);
        $provinceArray = json_decode($provinceJson, true);

        $provinces = [];
        if (!empty($provinceArray)) {
            foreach ($provinceArray as $item) {
                $provinces[$item['province_id']] = strtoupper($item['province']);
            }
        }

        return $provinces;
    }

    /**
     * Get cities by province ID
     *
     * @param int $provinceId
     * @return array
     */
    protected function getCities($provinceId)
    {
        $fileName = "cities_at_{$provinceId}.json";
        $filePath = $this->cacheFolder . $fileName;

        if (!Storage::disk('local')->exists($filePath)) {
            $response = $this->rajaOngkirRequest('city', ['province' => $provinceId]);
            $cityData = $response['rajaongkir']['results'] ?? [];
            Storage::disk('local')->put($filePath, json_encode($cityData));
        }

        $cityJson = Storage::get($filePath);
        $cityArray = json_decode($cityJson, true);

        $cities = [];
        if (!empty($cityArray)) {
            foreach ($cityArray as $city) {
                $cities[$city['city_id']] = strtoupper($city['type'] . ' ' . $city['city_name']);
            }
        }

        return $cities;
    }

    /**
     * Initialize Midtrans Payment Gateway
     */
    protected function initPaymentGateway()
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

}
