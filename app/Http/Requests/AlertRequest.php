<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlertRequest extends Request
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
        switch($this->method()){

            case 'POST':
                return [
                    'title'=> 'required|string',
                    'message'=> 'required|string',
                    'active' => 'required|boolean'
                ];
                break;

            case 'PUT':
                return [
                    'title'=> 'required|string',
                    'message'=> 'required|string',
                    'active' => 'required|boolean'
                ];
                break;
            default:break;
        }
    }
}
