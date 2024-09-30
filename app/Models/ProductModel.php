<?php

namespace App\Models;

use App\Models\CartModel;
use App\Models\OrderModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'image',
    ];
    public function transactions()
    {
        return $this->hasMany(TransactionsModel::class);
        // return $this->belongsToMany(OrderModel::class);
    }
    public function carts()
    {
        return $this->hasMany(CartModel::class);
    }
}