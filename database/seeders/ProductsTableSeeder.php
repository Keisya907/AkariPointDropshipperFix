<?php

namespace Database\Seeders; // wajib, karena file ada di folder database/seeders

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'nama_produk' => 'Produk A',
                'deskripsi' => 'Deskripsi produk A',
                'harga' => 10000,
                'stok' => 20,
                'foto' => 'produk-a.jpg',
                'available' => 1,
            ],
            [
                'nama_produk' => 'Produk B',
                'deskripsi' => 'Deskripsi produk B',
                'harga' => 20000,
                'stok' => 15,
                'foto' => 'produk-b.jpg',
                'available' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
