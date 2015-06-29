<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreNewUser extends Request {
    /**
     * This Request should not be used since we are integrating with wordpress.
     * Useful when e-commerce is seprated from wordpress
     */

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
            if(\Auth::user()->group_id!=1)
		return false;
            else
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
                    'first_name' => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'mobile' => 'required|numeric|digits:10',
                    'password' => 'required|min:5|confirmed',
                    'password_confirmation' => 'required|min:5',
                    'active' => 'required|boolean',
                    'group_id' => 'exists:groups,id',
                    
                    ];
	}

}
