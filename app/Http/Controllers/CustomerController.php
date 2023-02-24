<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function add()
    {
        return view('admin.customers.add');
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/customers/',$filename);
            $customer->image = "uploads/customers/".$filename;
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->contact = $request->contact;
        $customer->address = $request->address;
        $customer->save();

        return back()->with('message', 'Customer Added Successfully');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $customer)
    {
        $customer = Customer::find($customer);

        $image = $customer->image;
        if($request->hasFile('image')) {

            File::exists($image) ? File::delete($image) : null;

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/customers/',$filename);
            $customer->image = "uploads/customers/".$filename;
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->contact = $request->contact;
        $customer->address = $request->address;
        $customer->update();

        return back()->with('message', 'Customer Updated Successfully');
    }

    public function destroy(Customer $customer) 
    {
        File::exists($customer->image) ? File::delete($customer->image) : null;
        $customer->delete();
        return back()->with('message', 'Customer Deleted Successfully');

    }
}
