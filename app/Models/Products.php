<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelCart\Cartable;

class Products extends Model implements Cartable
{
    use hasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }
    public function getPrice(): float
    {
        return $this->price;
    }
}
