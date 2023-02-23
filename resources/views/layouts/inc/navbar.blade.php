<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Inventory System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('categories') }}">Category</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('products') }}">Product</a>
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
          </li>   
         @else
          <li class="nav-item">
            <a class="nav-link {{ url('/') ? 'active' : '' }}" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>