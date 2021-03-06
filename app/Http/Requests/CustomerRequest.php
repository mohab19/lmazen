<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|string|max:255',
            'mobile'  => 'required|numeric|digits_between:11,14',
            'email'   => 'nullable|string|email|max:255|unique:customers,email,'.$this->id,
            'address' => 'nullable|string|max:255',
        ];
    }
}
