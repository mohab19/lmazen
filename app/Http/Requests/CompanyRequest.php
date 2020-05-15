<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:companies,email,'.$this->id,
            'phone' => 'required|numeric',
            'company_type' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'image' => 'required_without:old_image|image|mimes:jpg,jpeg,png,gif',
            'video' => 'sometimes|required|mimes:webm,mp4'
        ];
        /*switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|string',
                    'email' => 'required|email|unique:companies,email,id',
                    'phone' => 'required|numeric',
                    'company_type' => 'required|string',
                    'description' => 'required|string',
                    'address' => 'required|string',
                    'image' => 'required_without:old_image|image|mimes:jpg,jpeg,png,gif',
                    'video' => 'sometimes|required|mimes:webm,mp4'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'required|numeric',
                    'company_type' => 'required|string',
                    'description' => 'required|string',
                    'address' => 'required|string',
                    'image' => 'required_without:old_image|image|mimes:jpg,jpeg,png,gif',
                    'video' => 'sometimes|required|mimes:webm,mp4'
                ];
            }
            default:break;
        }*/
    }
}
