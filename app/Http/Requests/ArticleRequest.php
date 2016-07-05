<?php

namespace App\Http\Requests;

use App\Article;
use App\Http\Requests\Request;

class ArticleRequest extends Request
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
        $article = Article::find($this->id);
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
                    'title' => 'required|unique:analysis,title',
                    'body' => 'required',
                    'intro' => 'required|unique:articles,intro',
                    'references' => 'required',
                    'tags' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png|min:1|max:750',
                    'product_id' => 'required|exists:products,id'
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required|unique:analysis,title,'.$article->id,
                    'body' => 'required',
                    'intro' => 'required|unique:analysis,intro,'.$article->id,
                    'references' => 'required',
                    'tags' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png|min:1|max:750',
                    'product_id' => 'required|exists:products,id'
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
