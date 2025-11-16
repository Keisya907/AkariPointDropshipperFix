<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Store;      
use App\Models\Category;   
use App\Models\Review;    
class Product extends Model
{
    protected $fillable = ['store_id', 'category_id', 'nama_produk', 'deskripsi', 'harga', 'stok', 'foto', 'link'];
public function getLinkAttribute($value)
{
    if (!$value) return null;

    // Kalau belum ada http/https, tambahkan otomatis
    if (!preg_match('#^https?://#i', $value)) {
        return 'https://' . $value;
    }

    return $value;
}

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);  
    }

    public function reviews()
{
    return $this->hasMany(\App\Models\Review::class, 'product_id');
}


    
}
