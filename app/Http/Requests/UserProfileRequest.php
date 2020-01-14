<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserProfileRequest extends FormRequest
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
            'email' => ['required', 'email',
                            Rule::unique('user_profiles')->ignore($this->input('id')),
                        ],
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => '',
            'suffix' => 'max:3',
            'gender' => 'required',
            'mobile_number' => ['required', 'regex:/^[0][9]\d{9}$/'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The email field is required.',
            'firstname.required' => 'The first name field is required.',
            'lastname.required' => 'The last name field is required.',
            'middlename.required' => '',
            'mobile_number.required' => 'The mobile number field is required.',
            'mobile_number.regex' => 'The mobile number must be a mobile number.',
            'mobile_number.min' => 'The mobile number must be at least 11 characters.',
            'gender.required' => 'The gender field is required.',
        ];
    }
}
