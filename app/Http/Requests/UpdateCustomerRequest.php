<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
            'firstname' => ['required','string','min:3','max:191',Rule::unique('customers', 'firstname')->ignore($this->customer)],
            'lastname' => ['required','string','min:3','max:191',Rule::unique('customers', 'lastname')->ignore($this->customer)],
            'date_of_birth' => ['required','date',Rule::unique('customers', 'date_of_birth')->ignore($this->customer)],
            'email' =>  ['required','email', 'max:255',Rule::unique('customers', 'date_of_birth')->ignore($this->customer)],
            'phonenumber' => 'nullable|phone:US,BE',
            'bank_account' => 'required|string|max:255',
        ];
    }
}
