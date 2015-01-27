<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class PeriodStoreRequest extends Request {

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
		];
	}

	/**
	 * Get the sanitized input for the request.
	 *
	 * @return array
	 */
	public function sanitize()
	{
        $input = $this->only('start', 'end', 'user_id');
        if ($this->has('start')) {
            $input['start'] = Carbon::createFromFormat('Y-m-d', $input['start']);
        }
        if ($this->has('end')) {
            $input['end'] = Carbon::createFromFormat('Y-m-d', $input['end']);
        }
		return $input;
	}

}
