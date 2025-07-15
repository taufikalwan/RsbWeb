<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atribut yang tidak boleh diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * Atribut yang disembunyikan saat serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus dikonversi tipe data.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relasi ke tabel wishlist milik user.
     */
    public function wishlists()
    {
        return $this->hasMany(WishList::class);
    }

    public function getPhoneAttribute($value)
{
    return preg_replace('/^0/', '62', $value); // ubah 0812 jadi 62812
}
}
