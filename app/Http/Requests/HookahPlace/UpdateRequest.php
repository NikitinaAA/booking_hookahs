<?php

namespace App\Http\Requests\HookahPlace;

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
        $hookahPlace = $this->route('hookah_place');

        return [
            'name' => 'required|max:255:unique:hookah_place,name,' . $hookahPlace->name
        ];
    }
}
