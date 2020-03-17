<?php

namespace App\Http\Requests\Hookah;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $hookah = $this->route('hookah');

        return [
            'name' => [
                'required',
                'max:255',
                'unique:hookah,name,'.$hookah->id.',id,tube_amount,'.$this->input('tube_amount').',hookah_place_id,'.$this->input('hookah_place_id')
            ],
            'hookah_place_id' => 'required|exists:hookah_place,id',
            'tube_amount' => 'required|integer'
        ];
    }
}
