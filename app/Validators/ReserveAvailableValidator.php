<?php

namespace App\Validators;

use App\Order;
use Carbon\Carbon;
use Illuminate\Validation\Validator;

class ReserveAvailableValidator extends Validator
{
    public function validateIsAvailable($attribute, $value, $parameters)
    {
        $reserve_time = Carbon::parse($parameters[0]);

        $isset = Order::query()->where('hookah_id', $value)
            ->where('reserve_at', '<=', $reserve_time)
            ->where('expired_at', '>=', $reserve_time)
            ->exists();

        return !$isset;
    }
}