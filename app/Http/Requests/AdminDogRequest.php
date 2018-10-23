<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Http\Request;

class AdminDogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()) {
           return true;
       }
        return redirect()->route('not-allow');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'          =>  'required|unique:dogs|max:255',
            'price'         =>  'required|numeric',
            'category_id'   =>  'required',
            'photos.*'      =>  'required|mimes:jpeg,bmp,png,jpg|size:2048',
            'height'        =>  'numeric',
            'weight'        =>  'numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'You must type name',
            'category_id.required'  => 'The name has already exsit',
            'price.required'        => 'You must type description',
            'photos.required'       => 'You must choose photos'
        ];
    }
}
