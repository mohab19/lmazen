<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'type_id'       => 'required|numeric',
            'brand_id'      => 'required|numeric',
            'supplier_id'   => 'required|numeric',
            'name'          => 'required|string|max:255',
            'description'   => 'required|string|max:255',
            'image'         => 'required_without:old_image|image|mimes:jpeg,jpg,png,gif',
            'buying_price'  => 'required|numeric',
            'selling_price' => 'required|numeric',
            'port_no'       => 'required|string',
            'quantity'      => 'required|numeric',
        ];
    }
}
