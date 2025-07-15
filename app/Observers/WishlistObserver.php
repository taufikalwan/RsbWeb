<?php


namespace App\Observers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Http;
class WishlistObserver
{
  public function created(Wishlist $wishlist): void
{
    $user = $wishlist->user;       // relasi ke user
    $product = $wishlist->product; // relasi ke produk

    // Pastikan data lengkap
    if (!$user || !$product || !$user->phone) {
        return;
    }

    $phone = $user->phone;
    $name = $user->first_name;
    $productName = $product->name;
    $productSlug = $product->slug;

    // Buat tautan produk (ubah ke URL kamu)
    $productLink = url('/product/' . $productSlug);

    // Buat isi pesan
    $message = "Halo $name, kamu baru saja menambahkan *$productName* ke wishlist kamu ❤️\n\n" .
               "Yuk, jangan cuma dilihat! Stok terbatas lho 😄\n\n" .
               "Langsung checkout di sini 👉 $productLink";

    // Kirim pesan ke Fonte
    Http::withHeaders([
        'Authorization' => 'Bearer ' . env('FONTE_API_TOKEN'),
        'Accept' => 'application/json',
    ])->post('https://app.fonte.chat/api/message/send-text', [
        'phone' => $phone,
        'message' => $message,
    ]);

}

    /**
     * Handle the Wishlist "updated" event.
     */
    public function updated(Wishlist $wishlist): void
    {
        //
    }
    /**
     * Handle the Wishlist "deleted" event.
     */
    public function deleted(Wishlist $wishlist): void
    {
        //
    }

    /**
     * Handle the Wishlist "restored" event.
     */
    public function restored(Wishlist $wishlist): void
    {
        //
    }

    /**
     * Handle the Wishlist "force deleted" event.
     */
    public function forceDeleted(Wishlist $wishlist): void
    {
        //
    }
}
