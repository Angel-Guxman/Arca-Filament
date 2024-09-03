<?php

namespace App\Livewire\Customer;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('resources.layouts.customer')] 
class DynamicSearch extends Component
{

    public $search = '';
    public function render()
    {
        $products =$this->search? Product::where('name', 'like', '%' . $this->search . '%')->get():[];
        return view('livewire.customer.dynamic-search', ['products' => $products]);
    }
}
