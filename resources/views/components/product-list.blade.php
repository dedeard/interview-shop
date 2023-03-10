@props(['product'])

<div {{ $attributes }}>
  <div class="card mb-4 shadow-sm">
    <img src="{{ $product->cover_url['small'] }}" class="card-img-top">
    <div class="card-body">
      <p class="h4 text-primary">
        Rp. {{ number_format($product->price, 0) }}
      </p>
      <p class="mb-0 text-truncate">
        <strong>
          <a href="{{ route('products.show', $product->slug) }}" class="text-secondary">{{ $product->name }}</a>
        </strong>
      </p>
      @if ($product->category)
        <p class="mb-0">
          <small>
            <a href="{{ route('products.index', ['category' => $product->category->id]) }}"
              class="text-secondary">{{ $product->category->name }}</a>
          </small>
        </p>
      @endif
    </div>
    <div class="card-footer">
      <div class="d-flex justify-content-between">
        <div class="col px-0">
          <livewire:add-to-cart-toggle :user="Auth::user()" :product="$product" />
        </div>
        <div class="ml-2">
          <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">
            Detail
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
