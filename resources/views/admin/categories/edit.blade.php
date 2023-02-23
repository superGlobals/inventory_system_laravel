@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-5 mx-auto mt-5">
        <x-message />
        <div class="card shadow border-0">
            <div class="card-header border-0 bg-white">
                <h4>
                    Edit Category
                    <a href="{{ route('categories') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection