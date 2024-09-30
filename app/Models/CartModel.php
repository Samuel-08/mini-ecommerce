<?php

namespace App\Models;

use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'amount',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        // return $this->belongsToMany(ProductModel::class);
        return $this->belongsTo(ProductModel::class, 'product_id', 'id');
    }
}