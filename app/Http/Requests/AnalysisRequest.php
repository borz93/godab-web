<?php

namespace App\Http\Requests;

use App\Analysis;
use App\Http\Requests\Request;

class AnalysisRequest extends Request
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
        $analysis = Analysis::find($this->id);
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
                    'title' => 'string|required|unique:analysis,title',
                    'body' => 'required',
                    'vote' => 'required|numeric|digits_between:0,10',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750',
                    'brand' => 'string|required',
                    'intro' => 'required|unique:analysis,intro',
                    'tags' => 'required',
                    'subproduct_id' => 'required|exists:subproducts,id',
                    'nutritional_info_name'=>'required|array',
                    'nutritional_info_quantity_x'=>'required|array',
                    'nutritional_info_quantity_y'=>'required|array'
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'string|required|unique:analysis,title,'.$analysis->id,
                    'body' => 'required',
                    'vote' => 'required|numeric|digits_between:0,10',
                    'image' => 'image|mimes:jpeg,png|min:1|max:750',
                    'brand' => 'string|required',
                    'intro' => 'required|unique:analysis,intro,'.$analysis->id,
                    'tags' => 'required',
                    'subproduct_id' => 'required|exists:subproducts,id',
                    'product' => 'required|exists:products,id'
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
