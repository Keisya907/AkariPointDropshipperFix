<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['user_id', 'nama_toko', 'deskripsi', 'alamat', 'kontak'];

    public function user() {
    return $this->belongsTo(User::class);
}

public function categories() {
    return $this->hasMany(Category::class);
}

public function products() {
    return $this->hasManyThrough(Product::class, Category::class);
}

    
}


