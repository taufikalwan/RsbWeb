<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RecentlyViewedProduct;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index()
    {
        if (!auth()) {
            return redirect()->back();
        }

        $products = Product::active()->get();
        $slides = Slide::active()->orderBy('position', 'ASC')->get();
        $categories = Category::parentCategories()->orderBy('name', 'asc')->get();

        // Inisialisasi default rekomendasi
        $recommendedProducts = collect();

        // Ambil rekomendasi hanya jika user login
        if (Auth::check()) {
            $recentlyViewed = RecentlyViewedProduct::with('product.category')
                ->where('user_id', Auth::id())
                ->latest()
                ->take(5)
                ->get();

            $lastViewedProduct = $recentlyViewed->first();

            if ($lastViewedProduct && $lastViewedProduct->product) {
                $recommendedProducts = Product::where('category_id', $lastViewedProduct->product->category_id)
                    ->where('id', '!=', $lastViewedProduct->product->id)
                    ->active()
                    ->inRandomOrder()
                    ->take(4)
                    ->get();
            }
        }

        return view('frontend.homepage', compact('products', 'slides', 'categories', 'recommendedProducts'));
    }
}
