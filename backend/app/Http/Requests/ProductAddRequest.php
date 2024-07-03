<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:2',
            'price'=> 'required',
            'category_id'=>'required',
            'content'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>"Tên không được để trống",
            'name.unique'=>"Tên đã tồn tại",
            'name.max'=>"Tên quá 255 kí tự",
            'name.min'=>"Tên dưới 10 kí tự",
            'category_id.required'=>"Danh mục không được để trống",
            'price.required'=>"Giá không được để trống",
            'content.required'=>"Nội dung không được để trống",

        ];
    }
}
