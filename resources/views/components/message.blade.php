@if (session()->has('message'))
    <div class="bg-success text-white p-2 mb-3">{{ session('message') }}</div>
@endif