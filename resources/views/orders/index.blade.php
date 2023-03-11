<x-app-layout title="Orders">

  <div class="jumbotron text-center">
    <div class="container">
      <h2 class="h1 m-0">ORDERS</h2>
    </div>
  </div>

  <section class="py-5">
    <div class="container">
      <div class="card">
        <div class="table-responsive m-0">
          <table class="table table-bordered m-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
                <th scope="col">Ordered At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                @php
                  $total = 0;
                @endphp
                @foreach ($order->details as $detail)
                  @php
                    $total += $detail->price * $detail->quantity;
                  @endphp
                @endforeach
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->status }}</td>
                  <td>Rp.&nbsp;{{ number_format($total, 0) }}</td>
                  <td>{{ $order->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Detail</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
