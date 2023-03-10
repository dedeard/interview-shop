<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;

class CartLists extends Component
{

    public User $user;

    public $carts;

    public $total;

    protected $listeners = ['cartUpdated' => 'mount'];

    public function mount()
    {
        $carts = $this->user->carts()->with('product')->orderBy('id', 'desc')->get();
        $this->total = 0;
        foreach ($carts as $cart) {
            $this->total += ($cart->quantity * $cart->product->price);
        }
        $this->carts = $carts;
    }

    public function render()
    {
        return view('livewire.cart-lists');
    }
}
