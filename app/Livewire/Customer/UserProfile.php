<?php

namespace App\Livewire\Customer;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UserProfile extends Component
{

    protected $listeners = [
        'updateView' => 'handleUpdateView',
        'updatePassword' => 'handleUpdatePassword',
        'updateEdit' => 'handleUpdateEdit',
        'changeToView' => 'handleChangeToView',
    ];
    public $user;
    public $mode='view';
    public function handleUpdateView(): void
{
    $this->mode='view';
}
public function handleUpdateEdit(): void
{
    $this->mode='edit';
}
public function handleUpdatePassword(): void
{
    $this->mode='password';
}
public function handleChangeToView(){
    $this->mode='view';


}
    


    public function mount($user = null)
    {
        $this->user = $user;
      
    }

    public function render()
    {
        return view('livewire.customer.user-profile');
    }
}
