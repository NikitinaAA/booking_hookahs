<?php

namespace App\Http\Requests\HookahPlace;

use App\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:hookah_place|max:255'
        ];
    }
}
