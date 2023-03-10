<header x-data="{
    navCollapse: true
}" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">IShop</a>
    <button class="navbar-toggler" type="button" x-on:click="navCollapse = !navCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="navbar-collapse" x-bind:class="{ collapse: navCollapse }">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('carts') }}">Cart
            @auth
              <livewire:cart-counter :user="Auth::user()" />
            @endauth
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @else
          @if (Auth::user()->is_admin)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
          </li>
        @endguest
      </ul>
    </nav>
  </div>
</header>
