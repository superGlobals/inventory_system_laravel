@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-5 mx-auto mt-5">
        <x-message />
        <div class="card shadow border-0">
            <div class="card-header border-0 bg-white">
                <h4>
                    Add Product
                    <a href="{{ route('products') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Quantity</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Category</label>
                        <select name="category_id" id="" class="form-select">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection