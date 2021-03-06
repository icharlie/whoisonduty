<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserStoreRequest extends Request {

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
            'name' => 'required|unique:users,name,' . $this->segment(2),
            'email' => 'required|email|unique:users,email,' . $this->segment(2),
            'position' => 'unique:users,position,' . $this->segment(2)
        ];
	}

	/**
	 * Get the sanitized input for the request.
	 *
	 * @return array
	 */
	public function sanitize()
	{
        $input = $this->only('name', 'email', 'position');
        if (! $input['position'] || $input['position'] == '') {
            $input['position'] = null;
        }
		return $input;
	}

}
