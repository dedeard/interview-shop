<div class="row">
  <div class="col-md-8">
    <div class="card card-body bg-white p-0">
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($carts as $cart)
            <livewire:cart-list :cart="$cart" :wire:key="$cart->id" />
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        Order Summary
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between font-weight-bold">
          <span>Total</span>
          <span>Rp {{ number_format($total, 0) }}</span>
        </div>
        <a href="{{ route('checkout') }}" class="btn btn-primary btn-block mt-3">Checkout</a>
      </div>
    </div>
  </div>
</div>
