<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class Cart extends Component
{
    public $cart;
    public $cartItems;
    public function mount($cart,$cartItems){
        $this->cart=$cart;
        $this->cartItems=$cartItems;
    }
    public function render()
    {
        return view('livewire.customer.cart');
    }
}
