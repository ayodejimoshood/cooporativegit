<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class createMemberForm extends Request {

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
			'firstname' => 'required',
			'lastname' => 'required',
			'gender' => 'required',
			'telephone_number' => 'required',
			'email' => 'required|unique:members',
			'next_of_kin_name' => 'required',
			'next_of_kin_number' => 'required',
			'next_of_kin_address' => 'required',
			//'phone_number' => 'required',
			//'firstName' => 'required|min:3',
			//'lastName' => 'required|min:3',
		];
	}

}
