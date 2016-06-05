<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Product;

class ProductsRequest extends Request
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
        $product = Product::find($this->id);
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
                    'name' => 'required|unique:products,name',
                    'description' => 'required',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750'
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:products,name,'.$product->id,
                    'description' => 'required',
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
