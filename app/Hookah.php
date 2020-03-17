<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hookah extends Model
{
    protected $table = 'hookah';

    protected $fillable = ['hookah_place_id', 'name', 'tube_amount'];

    const TUBE_PERSONS = 2;

    public function hookah_place()
    {
        return $this->belongsTo(HookahPlace::class);
    }

    public function orders()
    {
        return$this->hasMany(Order::class);
    }

    public function getPersonsLimitAttribute()
    {
        return $this->tube_amount * self::TUBE_PERSONS;
    }
}
