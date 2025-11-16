<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::latest()->get();
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Store::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('stores.index')->with('success', 'Toko berhasil dibuat!');
    }

    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $store->update($request->only('nama_toko', 'deskripsi'));

        return redirect()->route('stores.index')->with('success', 'Toko berhasil diperbarui!');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index')->with('success', 'Toko berhasil dihapus!');
    }
}
