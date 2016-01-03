<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
            'name' => 'required',
            'image' => 'required',
            'price' => 'required|numeric|min:0',
            'discount' => 'sometimes|numeric|max:1|min:0',
            'unit' => 'required',
            'max' => 'sometimes|integer|min:1',
            'remain' => 'sometimes|numeric',
            'detail' => 'required',
		];
	}

}
