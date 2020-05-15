<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'sector_id' => 'required|numeric',
            'company_id' => 'required|numeric',
            'title' => 'required|string|max:255',
            'image' => 'required_without:old_image|image|mimes:jpeg,jpg,png',
            'description' => 'required|string'
        ];
    }
}
