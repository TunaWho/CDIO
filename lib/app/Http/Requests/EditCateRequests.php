<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateRequests extends FormRequest
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
            'cateName' => 'unique:vp_categories,cate_name,'.$this->segment(4).',cate_id'
        ];
    }
    public function messages()
    {
        return [
            'cateName.unique' => 'This category already exist!'
        ];
    }
}
