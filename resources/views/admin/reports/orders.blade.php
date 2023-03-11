<x-admin.report-wrapper :title="$title">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Status</th>
        <th>Ordered At</th>
        <th>Total</th>
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
          <td>{{ $order->created_at }}</td>
          <td>Rp.&nbsp;{{ number_format($total, 0) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-admin.report-wrapper>
