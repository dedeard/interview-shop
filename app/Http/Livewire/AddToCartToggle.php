<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AddToCartToggle extends Component
{
    public  $user = null;
    public Product $product;

    public function onClick()
    {
        if (!$this->user || !$this->product) return null;
        $cart = $this->user->carts()->where('product_id', $this->product->id)->first();
        if (!$cart) {
            Cart::create([
                'user_id' => $this->user->id,
                'product_id' => $this->product->id,
                'quantity' => 1
            ]);
            $this->emit('cartUpdated');
        }
        session()->flash('success', 'Successfully adding product to cart');
    }

    public function render()
    {
        return view('livewire.add-to-cart-toggle');
    }
}
