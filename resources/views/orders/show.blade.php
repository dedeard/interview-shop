<x-app-layout>

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 m-0">ORDER DETAIL</h2>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <div class="table-responsive mb-3">
        <table class="table table-bordered bg-white">
          <tr>
            <th width="150px">ID</th>
            <td>{{ $order->id }}</td>
          </tr>
          <tr>
            <th width="150px">Status</th>
            <td>{{ $order->status }}</td>
          </tr>
          <tr>
            <th width="150px">Receipt number</th>
            <td>{{ $order->receipt_number }}</td>
          </tr>
          <tr>
            <th width="150px">Address</th>
            <td>{{ $order->address }}</td>
          </tr>
          <tr>
            <th width="150px">Ordered at</th>
            <td>{{ $order->created_at }}</td>
          </tr>

          <tr>
            <th width="150px">Actions</th>
            <td>
              @if ($order->status == 'delivery')
                <a href="{{ route('orders.update.confirm.received', $order->id) }}" class="btn btn-primary">Confirmation received</a>
              @endif
              @if ($order->status == 'pending')
                <form class="d-inline" action="{{ route('orders.cancel', $order->id) }}" method="post" x-data="{
                    onclick(e) {
                        e.preventDefault()
                        this.$store.deleteConfirm(() => {
                            this.$refs.formDeletePost.requestSubmit()
                        })
                    }
                }"
                  x-ref="formDeletePost" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger" x-on:click="onclick">
                    Cancel order
                  </button>
                </form>
              @endif
            </td>
          </tr>
        </table>
      </div>

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

            @foreach ($order->details as $detail)
              <tr>
                <td>
                  @if ($detail->product)
                    <img src="{{ $detail->product->cover_url['small'] }}" class="mr-3" width="50px">
                    <a href="{{ route('products.show', $detail->product->slug) }}">
                      {{ $detail->product->name }}
                    </a>
                  @else
                    NO NAME
                  @endif
                </td>
                <td>Rp.&nbsp;{{ number_format($detail->price, 0) }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>Rp.&nbsp;{{ number_format($detail->price * $detail->quantity, 0) }}</td>
              </tr>
              @php
                $total += $detail->price * $detail->quantity;
              @endphp
            @endforeach
            <tr>
              <td colspan="3" class="text-right">Total:</td>
              <td>Rp.&nbsp;{{ number_format($total, 0) }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      @if ($order->status == 'pending')
        <div class="card mb-3">
          <div class="card-header">How to pay</div>
          <div class="table-responsive mb-0">
            <table class="table table-bordered">
              <tr>
                <th width="150px">Via</th>
                <td>BANK TRANSFER</td>
              </tr>
              <tr>
                <th width="150px">Bank Type</th>
                <td>BRI</td>
              </tr>
              <tr>
                <th width="150px">Account number</th>
                <td>xxx-xx-xxxx-x</td>
              </tr>
              <tr>
                <th width="150px">Total</th>
                <td>Rp.&nbsp;{{ number_format($total, 0) }}</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="card">
          <div class="card-header">Proof of payment</div>
          <div class="card-body">
            <x-form-update-proof :order="$order" />
          </div>
        </div>
      @endif
    </div>
  </section>
</x-app-layout>
