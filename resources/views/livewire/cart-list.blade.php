<tr x-data>
  <td><a href="#">{{ $cart->product->name }}</a></td>
  <td>Rp&nbsp;{{ number_format($cart->product->price, 0) }}</td>
  <td><input type="number" wire:model="quantity" min="1"></td>
  <td>Rp&nbsp;{{ number_format($cart->product->price * $quantity, 0) }}</td>
  <td><button class="btn btn-danger btn-sm" x-on:click="$store.deleteConfirm($wire.destroy)">Delete</button></td>
</tr>
