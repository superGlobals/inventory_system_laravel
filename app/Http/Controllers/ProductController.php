<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $image = $request->file('image')->store('public/products'); // store product image in storage

        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);

        return back()->with('message', 'Product Added Successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $product)
    {
        $product = Product::find($product);

        $image = $product->image;
        if($request->hasFile('image')) {
            Storage::delete($image);
            $image = $request->file('image')->store('public/products');
        }

        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => $image
        ]);

        return back()->with('message', 'Product Updated Successfully');
    }
    
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();

        return back()->with('message', 'Product Deleted Successfully');
    }
}
