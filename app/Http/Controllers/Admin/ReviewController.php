<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews.
     */
    public function index()
    {
        $reviews = Review::with('product', 'user')->latest()->paginate(5);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Display the specified review.
     */
    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified review.
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified review in storage.
     */
    public function update(ReviewRequest $request, Review $review): RedirectResponse
    {
        $review->update($request->validated());

        return redirect()->route('admin.reviews.index')->with([
            'message' => 'Review berhasil diperbarui!',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with([
            'message' => 'Review berhasil dihapus!',
            'alert-type' => 'danger'
        ]);
    }
}
