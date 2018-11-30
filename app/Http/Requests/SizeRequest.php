<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
            'name' => 'required|min:1|max:5|unique:size,name'.$this->route('size'),
            'percent' => 'required|numberic',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên còn trống',
            'name.unique' => 'Tên đã tồn tại',
            'name.max' => 'Tên tối đa 5 kí tự',
            'name.min' => 'Tên thiểu đa 1 kí tự',
        ];
    }
}
