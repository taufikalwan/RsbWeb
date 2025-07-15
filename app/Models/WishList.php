<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WishList extends Model
{
    use HasFactory;

    /**
     * Atribut yang tidak boleh diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * Relasi ke produk dari wishlist.
     */

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
