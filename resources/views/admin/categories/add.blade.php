@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-5 mx-auto mt-5">
        <x-message />
        <div class="card shadow border-0">
            <div class="card-header border-0 bg-white">
                <h4>
                    Add Category
                    <a href="{{ route('categories') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection