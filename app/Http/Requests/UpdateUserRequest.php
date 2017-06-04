<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'unique:users,username,' .$this->id,
            'phone' => 'required|unique:users,phone,' .$this->id,
            'gender' => 'required',
            'email' => 'required|email:unique:users,email,' .$this->id
        ];
    }
}
