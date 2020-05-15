<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'type_id' => 'required|numeric',
            'company_id' => 'required|numeric',
            'image' => 'required_without:old_image|image|mimes:jpeg,jpg,png',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ];
    }
}
