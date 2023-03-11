<x-admin-layout>
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header d-flex">
        <h3>Order detail</h3>
        <form class="my-auto ml-auto" action="{{ route('admin.orders.destroy', $order->id) }}" method="post" x-data="{
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
          <button class="btn btn-sm btn-danger" x-on:click="onclick">
            Delete this order
          </button>
        </form>
      </div>
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
            <th width="150px">Name</th>
            <td>{{ $order->user->name }}</td>
          </tr>
          <tr>
            <th width="150px">Address</th>
            <td>{{ $order->address }}</td>
          </tr>
          <tr>
            <th width="150px">Ordered at</th>
            <td>{{ $order->created_at }}</td>
          </tr>
        </table>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered m-0">
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
                    {{ $detail->product->name }}
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
    </div>

    @if ($order->status == 'pending')
      <div class="card">
        <div class="card-header d-flex">
          <div class="h4">Proof of transaction</div>
          <form method="POST" action="{{ route('admin.orders.confirm.transaction', $order->id) }}" class="my-auto ml-auto">
            @csrf
            <button class="btn btn-sm btn-primary">Confirm transaction</button>
          </form>
        </div>
        <div class="card-body">
          <div class="border p-2">
            @if ($order->proof)
              <img src="{{ $order->proof_url }}" class="d-block w-100" />
            @else
              <p class="text-center">Still no proof of transaction.</p>
            @endif
          </div>
        </div>
      </div>
    @endif

    @if ($order->status == 'processed')
      <div class="card">
        <div class="card-header d-flex">
          <div class="h4">Input receipt number</div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.orders.update.receipt', $order->id) }}">
            @csrf

            <div class="form-group">
              <label for="receipt_number">Receipt number</label>
              <input type="text" class="form-control @error('receipt_number') is-invalid @enderror" id="receipt_number"
                name="receipt_number" placeholder="Receipt number" value="{{ old('receipt_number') }}">
              @error('receipt_number')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    @endif

  </div>
</x-admin-layout>
