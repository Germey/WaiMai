<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfigRequest extends Request
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'order_start' => 'required',
            'order_end' => 'required',
            'start_price' => 'required|numeric|min:0',
            'delivery_price' => 'required|numeric|min:0',
            'package_price' => 'required|numeric|min:0',
            'price_format' => 'required|integer|min:0|max:3',
            'on_business' => 'required|boolean',
        ];
    }

}
