<x-admin.report-wrapper :title="$title">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        @foreach ($order->details as $detail)
          <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $detail->product->name }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>Rp.&nbsp;{{ number_format($detail->price, 0) }}</td>
            <td>Rp.&nbsp;{{ number_format($detail->price * $detail->quantity, 0) }}</td>
          </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>
</x-admin.report-wrapper>
