<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'nama'       => 'nullable|string|max:100',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string|max:500',
        ]);

        $review = Review::create($validated);

        // 🟣 Jika request dari AJAX → kirim JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'review'  => $review,
            ]);
        }

        // 🩵 Kalau bukan AJAX (submit biasa)
        return back()->with('success', 'Ulasan berhasil dikirim!');
    }
}
