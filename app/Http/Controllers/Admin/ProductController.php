<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    // 🔹 Tampilkan semua produk milik user (berdasarkan toko)
    public function index()
    {
        $products = Product::whereHas('category.store', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();

        return view('admin.products.index', compact('products'));
    }

    // 🔹 Form tambah produk
    public function create()
    {
        $store = auth()->user()->store;

        if (!$store) {
            return redirect()->back()->withErrors('Kamu belum memiliki toko!');
        }

        $categories = Category::where('store_id', $store->id)->get();

        return view('admin.products.create', compact('categories'));
    }

    // 🔹 Simpan produk baru
   public function store(Request $request)
{
    $store = auth()->user()->store;

    if (!$store) {
        return redirect()->back()->withErrors('Kamu belum memiliki toko!');
    }

    // Validasi input
    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'harga'       => 'required|numeric|min:0',
        'stok'        => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'deskripsi'   => 'nullable|string',
        'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'link'        => 'nullable|url',
    ]);

    // Normalisasi link (tambah https bila tidak ada)
    if ($request->link && !preg_match('/^https?:\/\//', $request->link)) {
        $validated['link'] = 'https://' . $request->link;
    }

    // Upload foto
    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('products', 'public');
    }

    // Simpan produk
    Product::create([
        'store_id'    => $store->id,
        'category_id' => $validated['category_id'],
        'nama_produk' => $validated['nama_produk'],
        'deskripsi'   => $validated['deskripsi'] ?? null,
        'harga'       => $validated['harga'],
        'stok'        => $validated['stok'],
        'foto'        => $fotoPath,
        'link'        => $validated['link'] ?? null, // <<— ditambah
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
}


    // 🔹 Form edit produk
    public function edit(Product $product)
    {
        $store = auth()->user()->store;

        if (!$store) {
            return redirect()->back()->withErrors('Kamu belum memiliki toko!');
        }

        // Pastikan produk milik toko user
        if ($product->category->store->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya akses ke produk ini');
        }

        $categories = Category::where('store_id', $store->id)->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    // 🔹 Update data produk
    public function update(Request $request, Product $product)
{
    // Cek kepemilikan
    if ($product->category->store->user_id !== auth()->id()) {
        abort(403, 'Kamu tidak punya akses ke produk ini');
    }

    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'nama_produk' => 'required|string|max:255',
        'deskripsi'   => 'nullable|string',
        'harga'       => 'required|numeric|min:0',
        'stok'        => 'required|integer|min:0',
        'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'link'        => 'nullable|url',
    ]);

    // Normalisasi link
    if ($request->link && !preg_match('/^https?:\/\//', $request->link)) {
        $validated['link'] = 'https://' . $request->link;
    }

    // Update foto
    if ($request->hasFile('foto')) {
        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }
        $validated['foto'] = $request->file('foto')->store('products', 'public');
    }

    // Update semua data produk
    $product->update($validated);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
}


    // 🔹 Hapus produk
    public function destroy(Product $product)
    {
        // ✅ Tambah pengecekan akses
        if ($product->category->store->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya akses ke produk ini');
        }

        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }

        // 🔹 Tampilkan semua produk ke publik
    public function publicIndex()
    {
        $products = Product::with('category.store')->latest()->paginate(12);

        return view('public.produk.index', compact('products'));
    }

    // 🔹 Detail produk publik
    public function publicDetail($id)
    {
        $product = Product::with('category.store')->findOrFail($id);

        return view('public.produk.detail', compact('product'));
    }

    // 🔹 Tampilkan detail produk (untuk admin)
public function show(Product $product)
{
    // Pastikan produk milik toko user
    if ($product->category->store->user_id !== auth()->id()) {
        abort(403, 'Kamu tidak punya akses ke produk ini');
    }

    return view('admin.products.show', compact('product'));
}

}
