<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'         => 'required|max:191',
            'email'        => 'required|email|max:191',
            'new_password' => 'max:191',
            're_password'  => 'same:new_password',
            'address'      => 'required|max:191',
            'phone'        => 'required|min:10|max:11',
            'role'         => 'required',
            'avatar'       => 'mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Enter user name !',
            'name.max'              => 'Name must smaller 191 character !',
            'email.max'             => 'Email must smaller 191 character !',
            'email.required'        => 'Enter user name !',
            'email.email'           => 'Not is email !',
            'new_password.max'      => 'Password must smaller 191 character !',
            're_password.same'      => 'Password not same !',
            'address.required'      => 'Enter user address !',
            'address.max'           => 'Address must smaller 191 character !',
            'phone.required'        => 'Enter user phone number !',
            'phone.max'             => 'Phone must smaller 11 number !',
            'phone.min'             => 'Phone must at least 10 number !',
            'role.required'         => 'Select role !',
            'avatar.mimes'          => 'Extension is not true !',
        ];
    }
}
