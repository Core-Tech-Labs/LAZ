<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserDataRequest extends Request {

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
						'email' => 'email|max:255',
            'password' => 'required',
            'password_new'=> 'min:6|confirmed',
            'username' => 'max:15|min:4',
		];
	}

}
