<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_product()
    {
        //
        $products = ProductModel::all();;
        return view('indeks', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_product()
    {
        //
        return view('create_product');
    }

    public function store_product(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:999048',
        ]);
        $file = $request->file('image');

        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/' . $path,  file_get_contents($file));

        ProductModel::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);
        return Redirect::route('indeks_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_product(ProductModel $product)
    {
        return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_product(ProductModel $product)
    {
        //
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_product(ProductModel $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:999048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path, file_get_contents($file));

            $product->image = $path;
        }

        // Update field produk lainnya
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        // Simpan perubahan pada gambar (jika ada)
        $product->save();

        return Redirect::route('show_all', $product);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_product(ProductModel $product)
    {
        //
        $product->delete();
        return Redirect::route('indeks_product');
    }
}