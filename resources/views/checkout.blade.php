<x-app-layout title="Checkout">

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 m-0">CHECKOUT</h2>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <div class="table-responsive mb-3">
        <table class="table table-bordered bg-white">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @php
              $total = 0;
            @endphp

            @foreach ($carts as $cart)
              <tr>
                <td>
                  <img src="{{ $cart->product->cover_url['small'] }}" class="mr-3" width="50px">
                  <span>{{ $cart->product->name }}</span>
                </td>
                <td>Rp.&nbsp;{{ number_format($cart->product->price, 0) }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>Rp.&nbsp;{{ number_format($cart->product->price * $cart->quantity, 0) }}</td>
              </tr>
              @php
                $total += $cart->product->price * $cart->quantity;
              @endphp
            @endforeach

            <tr>
              <td colspan="3" class="text-right">Total:</td>
              <td>Rp.&nbsp;{{ number_format($total, 0) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="POST">
            @csrf

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" readonly placeholder="Name" value="{{ Auth::user()->name }}">
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">{{ old('address') }}</textarea>
              @error('address')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Create Order</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
