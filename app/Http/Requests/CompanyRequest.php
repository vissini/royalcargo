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
            'name' => 'required|string|max:255|min:3',
            'city' => 'required|string|max:255|min:3',
            'company_type' => 'required',
            'document_number' => 'required|string|max:18|min:11',
            'date_birth' => 'required_if:company_type,1|date|nullable',
            'rg' => 'required_if:company_type,1|nullable',
            'fantasy_name' => 'required_if:company_type,2|nullable|string|max:255|min:3'
        ];
    }
}
