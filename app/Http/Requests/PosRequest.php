<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosRequest extends FormRequest
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
                'customer_id'=> 'required',
                'payment'=> 'required',


        ];
    }

    public function messages(){
        return [

        ];
    }
}
