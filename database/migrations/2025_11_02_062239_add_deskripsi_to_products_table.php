<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // tambahkan kolom baru kalau belum ada
            if (!Schema::hasColumn('products', 'store_id')) {
                $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            }

            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            }

            if (!Schema::hasColumn('products', 'nama_produk')) {
                $table->string('nama_produk');
            }

            if (!Schema::hasColumn('products', 'harga')) {
                $table->decimal('harga', 15, 2);
            }

            if (!Schema::hasColumn('products', 'stok')) {
                $table->integer('stok')->default(0);
            }

            if (!Schema::hasColumn('products', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }

            if (!Schema::hasColumn('products', 'foto')) {
                $table->string('foto')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('store_id');
            $table->dropConstrainedForeignId('category_id');
            $table->dropColumn(['nama_produk', 'harga', 'stok', 'deskripsi', 'foto']);
        });
    }
};
