<?php

namespace App\Livewire\Customer;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordUserProfile extends Component
{
    public $user;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:5|confirmed',
        'new_password_confirmation' => 'required',
    ];
    public function mount($user){
        $this->user=$user;

    }
    public function updateView(){
        $this->validate();
        if (!Hash::check($this->current_password, $this->user->password)) {
            $this->addError('current_password', 'La contraseña actual es incorrecta.');
            return;
        }

        $this->user->password = Hash::make($this->new_password);
        $this->user->save();
        $this->dispatch('updateView');

  /*       session()->flash('message', 'Contraseña cambiada exitosamente.'); */

    }
    public function render()
    {
        return view('livewire.customer.password-user-profile');
    }
}
