<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserOrderCartPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|min:8|digits_between:8,15',
            'first_street' => 'required|string|min:2|max:255',
            'state' => 'required|string|min:2|max:255',
            'municipality' => 'required|string|min:2|max:255',
            'address' => 'required|string|min:2|max:255',
            'indications' => 'required|string|min:4',
            'country' => 'required|string|min:2|max:255',
            'post_code' => 'required|numeric|min:2',
            'second_street' => 'nullable|string|min:2|max:255',
            'interior_number' => 'nullable|numeric|min:1',
            'outdoor_number' => 'nullable|numeric|min:1',
        ];
    }
}
