<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreNewContact extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
                if(\Auth::check()){
                    return true;
                }
                    return false;
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
                    'emp_fullname' => 'required|max:255',
                    'emp_email' => 'required|email:255',
                    'emp_mobile' => 'required|numeric|digits:10',
                    'emp_dob' => 'required|date',   
                    'spouse_fullname' => 'required_if:emp_relship,yes|required_if:have_children,yes',
                   'spouse_dob' => 'required_if:emp_relship,yes|required_if:have_children,yes',
                    'anniversary' => 'required_if:emp_relship,yes|required_if:have_children,yes',
                    'fchild_name' => 'required_if:have_children,yes',
                    'fchild_dob' => 'required_if:have_children,yes',
                    'schild_dob' => 'required_with:schild_name',
                    'schild_name' => 'required_with:schild_dob',
                    ];
                    
	}
        

}
