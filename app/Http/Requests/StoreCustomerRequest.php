<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|min:3|max:191|unique:customers,firstname',
            'lastname' => 'required|string|min:3|max:191|unique:customers,lastname',
            'date_of_birth' => 'required|date|unique:customers,date_of_birth',
            'email' =>  'required|email|max:255|unique:customers,email',
            'phonenumber' => 'nullable|regex:/^09[0-9]{9}$/|phone:US,BE',
            'bank_account' => 'required|string|max:255',
        ];
    }
}
