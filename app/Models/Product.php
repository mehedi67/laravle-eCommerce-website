<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_photo'];

    public function Thumbnail(){
        return $this->hasMany(Product_thumbnail_photo::class, 'product_id');
    }
}
