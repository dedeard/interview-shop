<x-app-layout title="Products">

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 mb-5">PRODUCTS</h2>
      <form class="row">
        <div class="col-lg-9 mx-auto">
          <div class="input-group">
            <input type="search" name="search" value="{{ request()->get('search') }}" class="form-control form-control-lg"
              placeholder="Search">
            <select name="category" class="form-control form-control-lg">
              <option value="" selected>All Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == request()->get('category')) selected @endif>{{ $category->name }}</option>
              @endforeach
            </select>
            <div class="input-group-append">
              <button type="submit" class="btn btn-lg btn-primary">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <h6>
        Total Results: {{ $products->total() }}
      </h6>
      <div class="row">
        @foreach ($products as $product)
          <x-product-list class="col-md-6 col-lg-4" :product="$product" />
        @endforeach
      </div>
      {{ $products->links() }}
    </div>
  </section>
</x-app-layout>
