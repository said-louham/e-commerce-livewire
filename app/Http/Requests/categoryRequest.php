<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'description'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'image'=>'required',

        ];
    }
    public function messages()
{
        return [
            'name.required' => __('words.name.required'),
            'slug.required' => __('words.slug.required'),
            'description.required' => __('words.description.required'),
            'meta_title.required' => __('words.meta_title.required'),
            'meta_keyword.required' => __('words.meta_keyword.required'),
            'meta_description.required' => __('words.meta_description.required'),
            'image.required' => __('words.image.required'),
        ];
    }
}
