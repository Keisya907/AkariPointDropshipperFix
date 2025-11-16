<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // kasih tahu Laravel kalau nama tabelnya 'reviews'
    protected $table = 'reviews';

    // kolom yang boleh diisi mass assignment
    protected $fillable = [
        'product_id',
        'nama',
        'rating',
        'comment',
    ];

    // relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
