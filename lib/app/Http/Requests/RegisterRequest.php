<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'fullname' => 'unique:vp_users,name',
            'mail' => 'unique:vp_users,email',
            'mail' => 'required|email',
            'pass' => 'required|min:6|max:20',
            'fullname' => 'required|max:14',
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
}