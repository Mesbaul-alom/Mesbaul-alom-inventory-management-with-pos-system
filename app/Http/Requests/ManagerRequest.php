<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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


    public function rules()
    {
        return [
            'username'=> 'required|alpha',
            'fullname'=>'required|regex:/[a-zA-Z ]*/',
            'email'=> 'required|unique:managers',
            'image' => 'required|mimes:jpg,png',
            'password'=> 'required|min:6|max:8',
            'repassword'=> 'required|min:6|max:8',

        ];
    }

    public function messages(){
        return [

        ];
    }
}
