<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class doLoan extends Request {

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
			//
			'loan_amount' => 'required',
			'payment_duration' => 'required',
			//'phone_number' => 'required',
			//'firstName' => 'required|min:3',
			//'lastName' => 'required|min:3',
		];
	}

}
