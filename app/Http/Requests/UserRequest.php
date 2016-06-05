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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|unique:users,name',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6',
                    'role' => 'required',
                    'avatar' => 'required|image|mimes:jpeg,png|min:1|max:750'
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'unique:users,name',
                    'password' => 'required',
                    'new_password' => 'min:6|confirmed',
                ];
            }
            case 'PATCH':
        {
            return [];
        }
            default:break;
        }

    }
}
