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
        $input = [];
        if ($this->has('start')) {
            $input['start'] = Carbon::createFromFormat('Y-m-d', $this->get('start'));
        }
        if ($this->has('end')) {
            $input['end'] = Carbon::createFromFormat('Y-m-d', $this->get('end'));
        }
        if ($this->has('topic_id') && is_numeric($this->get('topic_id'))) {
            $input['topic_id'] = $this->get('topic_id');
        } else {
            $input['topic_id'] = null;
        }
        if ($this->has('user_id') && is_numeric($this->get('user_id'))) {
            $input['user_id'] = $this->get('user_id');
        } else {
            $input['user_id'] = null;
        }
        return $input;
    }

}
