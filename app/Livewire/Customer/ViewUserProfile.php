<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class ViewUserProfile extends Component
{
    public $user;
    public function mount($user){
        $this->user=$user;

    }

    public function updateEdit()
{
    $this->dispatch('updateEdit');
}
public function updatePassword()
{
    $this->dispatch('updatePassword');
}
    public function render()
    {
        return view('livewire.customer.view-user-profile');
    }
}
