<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'fullname' => 'required|max:14|unique:vp_users,name',
            'mail' => 'required|email|unique:vp_users,email',
            'pass' => 'required|min:6|max:20',
            're_pass' => 'required|same:pass'
        ];
    }
    public function messages()
    {
        return [
            'fullname.unique' => 'This Username already exist!',
            'mail.unique' => 'This E-mail already exist!',
            'mail.required' => 'E-mail can not be empty',
            'mail.email' => 'E-mail does not valid',
            'pass.required' => 'Password can not be empty',
            'fullname.max' => 'Tên chỉ chứa tối đa 14 ký tự',
            'pass.min' => 'Mật khẩu chứa ít nhất 6 ký tự',
            're_pass.same' => 'Mật khẩu không giống nhau'
        ];
    }
    public function FailedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))->status(200)->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
