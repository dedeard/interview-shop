<x-admin-layout>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3>Orders</h3>
        <div class="my-auto ml-auto">
          <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">Create Product</a>
        </div>
      </div>
      <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs px-3" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'all') active @endif" href="{{ route('admin.orders.index') }}">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'pending') active @endif"
              href="{{ route('admin.orders.index', ['tab' => 'pending']) }}">Pending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'processed') active @endif"
              href="{{ route('admin.orders.index', ['tab' => 'processed']) }}">Processed</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'delivery') active @endif"
              href="{{ route('admin.orders.index', ['tab' => 'delivery']) }}">Delivery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($tab == 'complete') active @endif"
              href="{{ route('admin.orders.index', ['tab' => 'complete']) }}">Complete</a>
          </li>
        </ul>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Status</th>
              <th>Total</th>
              <th>Ordered At</th>
              <th class="text-center" style="width: 100px;">Actions</th>
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
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->status }}</td>
                <td>Rp.&nbsp;{{ number_format($total, 0) }}</td>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                <td class="text-center py-0 align-middle">
                  <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">Detail</a>
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
</x-admin-layout>
