<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentlyViewedProduct extends Model
{
    use HasFactory;

    protected $table = 'recently_viewed_products'; // opsional jika nama tabel tidak mengikuti konvensi plural

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /**
     * Relasi ke produk yang dilihat.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
