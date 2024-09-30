<?php

namespace App\Models;

use App\Models\User;
use App\Models\TransactionsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'is_paid',
        'payment_receipt',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function products()
    // {
    //     return $this->belongsToMany(ProductModel::class);
    // }
    public function transactions()
    {
        // return $this->hasMany(TransactionsModel::class);
        return $this->hasMany(TransactionsModel::class, 'order_id', 'id');
    }
}