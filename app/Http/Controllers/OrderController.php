<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\TransactionsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        //
        $this->middleware('auth');
    }
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = CartModel::where('user_id', $user_id)->get();
        if ($carts == null) {
            return Redirect::back();
        }
        $order = OrderModel::create([
            'user_id' => $user_id,
        ]);
        foreach ($carts as $ca) {
            $product = ProductModel::find($ca->product_id);

            $product->update([
                'stock' => $product->stock - $ca->amount
            ]);
            TransactionsModel::create([
                'amount' => $ca->amount,
                'order_id' => $order->id,
                'product_id' => $ca->product_id,
            ]);

            $ca->delete();
        }
        return redirect::back();
    }
    public function index_order()
    {
        $orders = OrderModel::all();
        return view('index_v_order', compact('orders'));
    }

    public function show_order(OrderModel $order)
    {
        return view('show_v_order', compact('order'));
    }

    public function payment(OrderModel $order, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path,  file_get_contents($file));

        $order->update([
            'payment_receipt' => $path
        ]);
        return redirect::back()->with('berhasil');
    }
    public function confirm_payment(OrderModel $order)
    {
        $order->update([
            'is_paid' => true
        ]);
        return redirect::back();
    }
}