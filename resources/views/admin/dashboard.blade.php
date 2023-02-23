@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        <x-message />
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white border-0">
                        <h4 class="fw-bold text-center">Category Count</h4>
                    </div>
                    <div class="card-body">
                        <h2 class="fw-bold text-center">0</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white border-0">
                        <h4 class="fw-bold text-center">Product Count</h4>
                    </div>
                    <div class="card-body">
                        <h2 class="fw-bold text-center">0</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white border-0">
                        <h4 class="fw-bold text-center">User Count</h4>
                    </div>
                    <div class="card-body">
                        <h2 class="fw-bold text-center">0</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0">
                    <div class="card-header bg-danger text-white border-0">
                        <h4 class="fw-bold text-center">Supplier Count</h4>
                    </div>
                    <div class="card-body">
                        <h2 class="fw-bold text-center">0</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection