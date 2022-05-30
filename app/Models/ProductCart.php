<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function userInfo(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function productInfo(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
