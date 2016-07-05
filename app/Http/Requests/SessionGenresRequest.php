<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\SessionGenre;

class SessionGenresRequest extends Request
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
        $session_genre = SessionGenre::find($this->id);
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
                    'name' => 'required|unique:session_genres,name',
                    'description' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png|min:1|max:750'
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:session_genres,name,'.$session_genre->id,
                    'description' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png|min:1|max:750'
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
