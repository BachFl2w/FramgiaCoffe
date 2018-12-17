<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'receiver' => 'required|max:100',
            'email' => 'required|email',
            'place' => 'required|max:300',
            'phone' => 'required|regex:/(0)[0-9]{9,10}/',
            'note' => 'max:300',
        ];
    }

    public function messages()
    {
        return [
            'receiver.required' => 'Name is not empty',
            'receiver.max' => 'Name must smaller 100 character !',
            'email.required' => 'Email is not empty',
            'email.email' => 'Email is wrong',
            'place.required' => 'Enter user address !',
            'place.max' => 'Address must smaller 300 character !',
            'phone.regex' => 'Your phone is wrong !',
            'phone.required' => 'Must enter number phone !',
            'note.max' => 'Enter smaller than 300 character',
        ];
    }
}
