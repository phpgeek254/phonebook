<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhonebookRequest extends FormRequest
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
            'email'=>'required|unique:phonebooks',
            'name'=>'required|unique:phonebooks',
            'phone_number'=>'required|numeric'
        ];
    }
}
