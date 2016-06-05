<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Subproduct;

class SubproductsRequest extends Request
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
        $subproduct = Subproduct::find($this->id);
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
                    'name' => 'required|unique:subproducts,name',
                    'description' => 'required',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750',
                    'product' =>'required|exists:products,id'
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:subproducts,name,'.$subproduct->id,
                    'description' => 'required',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750',
                    'product' =>'required|exists:products,id'
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
