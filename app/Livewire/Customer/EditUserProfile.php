<?php

namespace App\Livewire\Customer;

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUserProfile extends Component
{
    public $data;
    public $state;
    public $municipios = [];
    public $municipio;
    public $user;
    public $name;
    public $last_name;
    public $email;
    public $phone;
    public $first_street;
    public $second_street;
    public $interior_number;
    public $outdoor_number;
    public $address;
    public $post_code;
    public $indications;
    public $country;
    public $municipality;
    public function mount($user)
    {

        // Ruta del archivo en el directorio de almacenamiento
        $filePath = 'public/states.json';

        // Lee el contenido del archivo
        $json = Storage::get($filePath);

        // Decodifica el JSON en un array
        $this->data  = json_decode($json, true);
        $this->user = $user;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->first_street = $user->first_street;
        $this->second_street = $user->second_street;
        $this->interior_number = $user->interior_number;
        $this->outdoor_number = $user->outdoor_number;
        $this->address = $user->address;
        $this->post_code = $user->post_code;
        $this->indications = $user->indications;
        $this->country = $user->country;
        if ($user->state) {
            $this->municipios = $this->data[$user->state] ?? [];
        }
        $this->state = $user->state ?? '';
        $this->municipality = $user->municipality ?? '';
    }

    public function rules()
    {
        // Define reglas de validación dinámicas
        $rules = [
            'name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            'phone' => 'nullable|string|max:20|min:8',
            'first_street' => 'nullable|string|max:255',
            'second_street' => 'nullable|string|max:255',
            'interior_number' => 'nullable|string|max:255',
            'outdoor_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:255',
            'indications' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ];

        // Aplica reglas condicionales si el campo tiene un valor
        if (!empty($this->phone)) {
            $rules['phone'] = 'required|max:20|min:8';
        }
        if (!empty($this->first_street)) {
            $rules['first_street'] = 'required|string|max:255';
        }
        if (!empty($this->interior_number)) {
            $rules['interior_number'] = 'required|numeric|min:1|max:999999';
        }
        if (!empty($this->outdoor_number)) {
            $rules['outdoor_number'] = 'required|numeric|min:1|max:999999';
        }
        if (!empty($this->address)) {
            $rules['address'] = 'required|string|max:255';
        }
        if (!empty($this->state)) {
            $rules['state'] = 'required|string|max:255';
            $rules['municipality'] = 'required|string|max:255';
        }
        if (!empty($this->municipality)) {
            $rules['municipality'] = 'required|string|max:255';
        }
        if (!empty($this->post_code)) {
            $rules['post_code'] = 'required|numeric|min:5|max:99999';
        }

        if (!empty($this->indications)) {
            $rules['indications'] = 'required|string|max:255';
        }
        if (!empty($this->country)) {
            $rules['country'] = 'required|string|max:255';
        }



        return $rules;
    }


    public function updateView()
    {
        $this->validate();
        // Actualiza la información del usuario
        $this->user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'first_street' => $this->first_street,
            'second_street' => $this->second_street,
            'interior_number' => $this->interior_number,
            'outdoor_number' => $this->outdoor_number,
            'address' => $this->address,
            'state' => $this->state == '' ? null : $this->state,
            'municipality' => $this->municipality == '' ? null : $this->municipality,
            'post_code' => $this->post_code,
            'indications' => $this->indications,
            'country' => 'México',
        ]);
        $this->dispatch('updateView');
    }
    public function updatedState($state)
    {
        $this->municipality = '';
        $this->municipios = $this->data[$state] ?? [];
    }
    public function changeToView()
    {
        $this->dispatch('changeToView');
    }


    public function render()
    {
        return view('livewire.customer.edit-user-profile', ['data' => $this->data, 'municipios' => $this->municipios]);
    }
}
