<x-app-layout>

  <div class="jumbotron text-center">
    <div class="container">
      <h1 class="display-4">Welcome to <strong>IShop</strong></h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or
        information.</p>
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Start Shopping Now</a>
      </p>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <h2>New Products</h2>
      <div class="row">
        @foreach ($products as $product)
          <x-product-list class="col-md-6 col-lg-4" :product="$product" />
        @endforeach
      </div>
      <div class="text-center py-3">
        <a href="#" class="btn btn-primary">Browse All Products</a>
      </div>
    </div>
  </section>
</x-app-layout>
