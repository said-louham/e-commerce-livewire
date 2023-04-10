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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'slug'=>'required',
            'brand'=>'required',
            'small_description'=>'required',
            'description'=>'required',
            'original_price'=>'required',
            'selling_price'=>'required',
            'quantity'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'category_id'=>'required',
        ];
    }


    public function messages()
{
    return [
        'required' => 'The :attribute field is required.',
        'string' => 'The :attribute field must be a string.',
        'numeric' => 'The :attribute field must be a number.',
        'integer' => 'The :attribute field must be an integer.',
        'boolean' => 'The :attribute field must be a boolean.',
    ];
}

}





















