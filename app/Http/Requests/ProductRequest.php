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
            'name' => 'required|max:200|unique:product,name' . $this->route('product'),
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên ko để trống',
            'name.max' => 'Tên ko quá 200 kí tự',
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'Giá ko để trống',
            'price.numeric' => 'Giá phải kiểu số',
            'quantity.required' => 'Số lượng ko để trống',
            'quantity.numeric' => 'Số lượng phải là kiểu số',
            'quantity.min' => 'Số lượng phải lớn hơn 0',
            'category_id.required' => 'Chưa chọn thể loại',
            'image.required' => 'Chưa có ảnh',
            'image.mimes' => 'Ảnh phải có đinh dạng jpg, png hoặc jpeg',
            'image.image' => 'Không phải ảnh',
        ];
    }
}
