@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-4 mx-auto mt-5">
        <div class="card shadow border-0 rounded">
            <div class="card-header border-0 bg-white text-center">
                <h3 class="fw-bold ">Register</h3>
                <span class="form-text">Create an account here</span>
            </div>
            <div class="card-body">
                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-success w-100">Register</button>
                    <div class="mt-3">
                        <a href="{{ route('login') }}" class="float-end">Already register login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection