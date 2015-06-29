<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSenderIDStatus extends Request {

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
                    'id' => 'required|numeric',
                    //'senderid_name' => 'required|max:6',
                    'senderid_status'=>'required',
                    'senderid_note'
                    
		];
	}

}
