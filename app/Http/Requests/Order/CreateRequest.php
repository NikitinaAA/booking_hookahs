<?php

namespace App\Http\Requests\Order;

use App\Hookah;
use App\Http\Requests\BaseRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CreateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $hookah_id = $this->request->get('hookah_id');
        $hookah = Hookah::query()->find($hookah_id);

        if (!$hookah) {
            throw new ModelNotFoundException('Hookah does not exist');
        }

        return [
            'hookah_id' => 'required|exists:hookah,id|is_available:'.$this->request->get('reserve_at'),
            'person_amount' => 'required|integer|min:1|max:'.$hookah->persons_limit,
            'reserve_at' => 'required|date_format:d-m-Y H:i|after:'.Carbon::now()
        ];
    }
}
