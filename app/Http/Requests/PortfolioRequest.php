<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'name' => 'required|min:2|max:15',
            'surname' => 'required|max:15',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il title è un campo obbligatorio',
            'name.required' => 'Il name è un campo obbligatorio',
            'title.min' => 'Il title deve avere almeno :min caratteri',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome non può avere piu di :max caratteri',
            'surname.max' => 'Il surname non può avere piu di :max caratteri',
            'description.required' => 'description è un campo obbligatorio'
        ];
    }
}
