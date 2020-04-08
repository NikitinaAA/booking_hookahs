<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['hookah_id', 'user_name', 'person_amount', 'reserve_at', 'expired_at'];

    public function hookah()
    {
        return $this->belongsTo(Hookah::class);
    }

    public function setReserveAtAttribute($value)
    {
        $this->attributes['reserve_at'] = Carbon::parse($value)->setTimezone(config('app.timezone'));
    }
}
