<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Post;

class PostsRequest extends Request
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
        $post = Post::find($this->id);
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
                    'title' => 'required|unique:posts,title',
                    'body' => 'required',
                    'tags' => 'required',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750'
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required|unique:posts,title,'.$post->id,
                    'body' => 'required',
                    'tags' => 'required',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750'
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
