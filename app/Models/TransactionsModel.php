<?php

namespace App\Models;

use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionsModel extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
    ];
    public function order()
    {
        return $this->belongsTo(OrderModel::class);
    }
    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}