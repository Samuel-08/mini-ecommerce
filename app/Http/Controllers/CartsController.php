<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        //
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function add_carts(ProductModel $product, Request $request)
    {

        $request->validate([
            'amount' => 'required|gte:1|lte:' . $product->stock
        ]);
        $user_id = Auth::id();
        $product_id = $product->id;
        CartModel::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $request->amount
        ]);
        return Redirect::route('show_cart');
    }
    /**
     * Display the specified resource.
     */
    public function show_cart()
    {
        $user_id = Auth::id();
        // Menghitung langsung jumlah data
        $jumlah = CartModel::where('user_id', $user_id)->count();
        // Mengambil semua item keranjang untuk ditampilkan
        $carts = CartModel::where('user_id', $user_id)->get();

        return view('carts_view', compact('carts', 'jumlah',));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update_cart(CartModel $cart, Request $request)
    {
        //
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);
        return Redirect::route('show_cart');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete_cart(CartModel $cart)
    {
        //
        $cart->delete();
        return redirect::back();
    }
}