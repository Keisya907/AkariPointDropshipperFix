<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Notification;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $reviews = Review::whereHas('product.category.store', function ($q) {
            $q->where('user_id', auth()->id());
        })->latest()->get();

        return view('admin.ulasan.index', compact('reviews'));
    }

    public function destroy(Ulasan $ulasan)
    {
        Notification::create([
            'user_id' => 1, // superadmin ID
            'title' => 'Permintaan Hapus Ulasan',
            'message' => 'Admin meminta penghapusan ulasan ID ' . $ulasan->id,
            'type' => 'report',
            'related_id' => $ulasan->id,
        ]);

        return redirect()->route('ulasans.index')->with('success', 'Permintaan hapus ulasan dikirim ke superadmin.');
    }
}