<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartList extends Component
{
    public Cart $cart;

    public $quantity;

    public function mount()
    {
        $this->quantity = $this->cart->quantity;
    }


    public function updatedQuantity()
    {
        $data = $this->validate(['quantity' => 'required|numeric|min:1']);
        $this->cart->update([
            'quantity' => $data['quantity']
        ]);
        $this->emit('cartUpdated');
    }

    public function destroy()
    {
        $this->cart->delete();
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart-list');
    }
}
