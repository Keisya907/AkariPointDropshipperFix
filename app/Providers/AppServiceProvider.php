<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        try {
            // Tes koneksi ke Supabase
            DB::connection('pgsql')->getPdo();
            Log::info('✅ Connected to Supabase database.');
        } catch (\Exception $e) {
            Log::warning('⚠️ Supabase connection failed, switching to local DB: ' . $e->getMessage());

            // Pakai konfigurasi manual buat fallback
            Config::set('database.connections.fallback_mysql', [
                'driver' => 'mysql',
                'host' => env('LOCAL_DB_HOST', '127.0.0.1'),
                'port' => env('LOCAL_DB_PORT', '3306'),
                'database' => env('LOCAL_DB_DATABASE', 'akari_local'),
                'username' => env('LOCAL_DB_USERNAME', 'root'),
                'password' => env('LOCAL_DB_PASSWORD', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
            ]);

            Config::set('database.default', 'fallback_mysql');
            Log::info('🔁 Switched to local MySQL fallback.');
        }
    }
}
