<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
           'name'=>'required|min:3|max:45', //
           'password'=>'required|min:3|max:25'
           //'email'=>'required|unique|users|max:255',
           //'roleID'=>'required'
            //'title' => 'required|unique:posts|max:255',
        ];
    }


}
