<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // ✅ 1. Lihat daftar notifikasi user login
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('notifications.index', compact('notifications'));
    }

    // ✅ 2. Lihat detail notifikasi
    public function show(Notification $notification)
    {
        // Pastikan user hanya bisa lihat notifikasi miliknya
        abort_if($notification->user_id !== auth()->id(), 403);

        $notification->update(['is_read' => true]);
        return view('notifications.show', compact('notification'));
    }

    // ✅ 3. Hapus notifikasi
    public function destroy(Notification $notification)
    {
        abort_if($notification->user_id !== auth()->id(), 403);

        $notification->delete();
        return redirect()->route('admin.notifikasi.index')
            ->with('success', 'Notifikasi berhasil dihapus.');
    }

    // ✅ 4. Superadmin kirim notifikasi ke admin
    public function store(Request $request)
    {
        // Pastikan hanya superadmin yang boleh kirim
        if (auth()->user()->role !== 'superadmin') {
            abort(403, 'Anda tidak punya akses untuk mengirim notifikasi.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'nullable|string|max:50',
            'related_id' => 'nullable|integer'
        ]);

        Notification::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type ?? 'info',
            'related_id' => $request->related_id,
        ]);

        return redirect()->back()->with('success', 'Notifikasi berhasil dikirim.');
    }
}
