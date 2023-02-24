<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.purchase.index', compact('purchases'));
    }

    public function add()
    {
        $products = Product::where('quantity','>=', 2)->get();
        $customers = Customer::all();
        return view('admin.purchase.add', compact('products', 'customers'));
    }

    public function store(PurchaseRequest $request)
    {
        $purchase = new Purchase;
        $product = Product::findOrFail($request->product_id);

        if($request->quantity > $product->quantity) {
            return back()->with('message_danger',"The available product quantity you selected is $product->quantity");
        }

        // update the quantity in products table
        DB::table('products')->where('id', $request->product_id)
                             ->update(['quantity' => DB::raw("quantity - $request->quantity")]);

        $purchase->product_id = $request->product_id;
        $purchase->customer_id = $request->customer_id;
        $purchase->quantity = $request->quantity;
        $purchase->date_purchase = $request->date_purchase;
        $purchase->total_bill = $product->price * $request->quantity;
        $purchase->save();

        return back()->with('message', 'Purchase Added Successfully');
    }

    public function destroy($purchase)
    {
        Purchase::where('id', $purchase)->delete();
        return back()->with('message', 'Purchase Deleted Successfully');
    }
}
