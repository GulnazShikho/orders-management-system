<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeorders extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //public function authorize()
    //{
      //  return true;
   // }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'OrderTitle'=>'required',
            'order'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'OrderTitle.required' => trans('validation.required'),
            'order.required' => trans('validation.required'),
        ];

    }
}
