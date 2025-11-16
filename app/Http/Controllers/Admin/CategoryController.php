<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // ============================
    // 🔹 BAGIAN ADMIN
    // ============================
    public function index()
    {
        $user = auth()->user();

        $categories = $user->store
            ? Category::where('store_id', $user->store->id)->get()
            : collect();

        return view('admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
            'store_id'      => auth()->user()->store->id,
        ]);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil dibuat!');
    }

    public function edit(Category $category)
    {
        return view('admin.kategori.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        $category->update($request->only('nama_kategori', 'deskripsi'));

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori diperbarui!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori dihapus!');
    }

    public function show($id)
    {
        $kategori = Category::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    // ============================
    // 🌐 BAGIAN PUBLIK
    // ============================

    // 🔹 Tampilkan semua kategori & produk
    public function publicIndex()
    {
        $categories = Category::all();
        $products = Product::with('category.store')->latest()->paginate(12);

        return view('public.kategori.index', compact('categories', 'products'));
    }

    // 🔹 Tampilkan produk berdasarkan kategori
    public function showProducts($id)
    {
        $category = Category::with('products')->findOrFail($id);
        $categories = Category::all();
        $products = $category->products;

        return view('public.kategori.index', compact('categories', 'products', 'category'));
    }

    // 🔹 Pencarian kategori + produk
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $categories = Category::where('nama_kategori', 'like', "%$keyword%")
            ->orWhere('deskripsi', 'like', "%$keyword%")
            ->get();

        $products = Product::where('nama_produk', 'like', "%$keyword%")
            ->orWhere('deskripsi', 'like', "%$keyword%")
            ->with('category.store')
            ->paginate(12);

        return view('public.kategori.index', compact('categories', 'products', 'keyword'));
    }

    // 🔹 Filter kategori (misal berdasarkan dropdown)
    public function filter(Request $request)
    {
        $filter = $request->input('filter_kategori');

        $categories = Category::all();

        $products = $filter
            ? Product::where('category_id', $filter)->with('category.store')->paginate(12)
            : Product::with('category.store')->paginate(12);

        return view('public.kategori.index', compact('categories', 'products', 'filter'));
    }
}
