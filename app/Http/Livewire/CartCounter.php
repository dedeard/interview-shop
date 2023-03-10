<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CartCounter extends Component
{
    public User $user;
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'mount'];

    public function mount()
    {
        $this->count = $this->user->carts()->count();
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
