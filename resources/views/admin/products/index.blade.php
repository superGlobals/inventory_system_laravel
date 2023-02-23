@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <x-message />
        <div class="card shadow border-0">
            <div class="card-header border-0 bg-white">
                <h4>
                    Product List
                    <a href="{{ route('product.add') }}" class="btn btn-primary float-end">New Product</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-respomsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img src="{{ Storage::url($product->image) }}" width="80" height="80" alt=""></td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->category->category_name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>{{ $product->quantity  }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection