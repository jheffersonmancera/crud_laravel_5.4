<?php

namespace Rimorsoft\Http\Requests;

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
        return true;//*1PRODUCTREQUEST
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [//*2PRODUCTREQUEST
            'name'  => 'required',
            'short' => 'required',
            'body'  => 'required',

        ];
    }
}
