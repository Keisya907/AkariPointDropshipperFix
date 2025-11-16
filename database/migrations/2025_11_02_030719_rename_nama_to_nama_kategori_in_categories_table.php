<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tambahkan kolom baru dulu
        Schema::table('categories', function (Blueprint $table) {
            $table->string('nama_kategori')->nullable();
        });

        // Copy data dari kolom lama
        DB::statement('UPDATE categories SET nama_kategori = name');

        // Hapus kolom lama
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    public function down()
    {
        // Buat rollback aman
        Schema::table('categories', function (Blueprint $table) {
            $table->string('name')->nullable();
        });

        DB::statement('UPDATE categories SET name = nama_kategori');

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('nama_kategori');
        });
    }
};
