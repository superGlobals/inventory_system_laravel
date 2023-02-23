@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <x-message />
        <div class="card shadow border-0">
            <div class="card-header border-0 bg-white">
                <h4>
                    Category List
                    <a href="{{ route('category.add') }}" class="btn btn-primary float-end">New Category</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-respomsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
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