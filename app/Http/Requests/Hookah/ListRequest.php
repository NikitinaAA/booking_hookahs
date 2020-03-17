<?php

namespace App\Http\Requests\Hookah;

use App\Http\Requests\BaseRequest;
use Carbon\Carbon;

class ListRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'required|date_format:d-m-Y H:i|after:'.Carbon::now(),
            'to' => 'required|date_format:d-m-Y H:i|after:from|after:'.Carbon::now(),
            'person_amount' => 'required|integer|min:1'
        ];
    }
}
