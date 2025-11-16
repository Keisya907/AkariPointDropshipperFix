<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('reviews', function (Blueprint $table) {
        $table->renameColumn('user_id', 'nama');
    });
}

public function down()
{
    Schema::table('reviews', function (Blueprint $table) {
        $table->renameColumn('nama', 'user_id');
    });
}

};
