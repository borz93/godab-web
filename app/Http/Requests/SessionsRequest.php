<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Session;

class SessionsRequest extends Request
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
        $session = Session::find($this->id);
        switch($this->method()){
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'string|required|unique:sessions,title',
                    'video' => 'url|required',
                    'body' => 'required',
                    'session_genre_id' => 'required|exists:session_genres,id',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750'
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'string|required|unique:sessions,title,'.$session->id,
                    'video' => 'url',
                    'body' => 'required',
                    'session_genre_id' => 'required|exists:session_genres,id',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750'
                ];
            }
            case 'PATCH':
            {
                return [
                ];
            }
            default:break;
        }

    }
}
