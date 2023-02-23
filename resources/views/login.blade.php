@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-4 mx-auto mt-5">
        <x-message />
        <div class="card shadow border-0 rounded">
            <div class="card-header border-0 bg-white text-center">
                <h3 class="fw-bold ">Login</h3>
                <span class="form-text">Manage your inventory</span>
            </div>
            <div class="card-body">
                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Login</button>
                    <div class="mt-3">
                        <a href="{{ route('register') }}" class="float-end">Don't have an account register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection