<x-app-layout>

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 m-0">DETAIL PRODUCT</h2>
    </div>
  </div>

  <section class="pb-5">
    <div class="container" x-data="{ play: false }">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <img class="d-block w-100" src="{{ $product->cover_url['large'] }}" alt="{{ $product->name }}">
            </div>
            <div class="col-lg-8">
              <h1 class="h2 mb-3">{{ $product->name }}</h1>
              @if ($product->category)
                <p class="mb-3">
                  <a href="{{ route('products.index', ['category' => $product->category->id]) }}"
                    class="btn btn-sm  btn-outline-secondary">{{ $product->category->name }}</a>
                </p>
              @endif
              <p class="h4 text-primary">
                Rp. {{ number_format($product->price, 0) }}
              </p>
              <div class="d-flex justify-content-between">
                <div class="col px-0">
                  <livewire:add-to-cart-toggle :user="Auth::user()" :product="$product" />
                </div>
                @if ($product->video)
                  <div class="ml-2">
                    <button class="btn btn-primary" @click="play = !play" x-text="play ? 'Stop Video' : 'Watch Video'">
                      Watch Video
                    </button>
                  </div>
                @endif
              </div>
            </div>
          </div>
          @if ($product->video)
            <template x-if="play">
              <div class="pt-3">
                <video src="{{ $product->video_url }}" class="d-block w-100" controls autoplay></video>
              </div>
            </template>
          @endif
        </div>
        <div class="card-body border-top">
          {!! $product->description !!}
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
