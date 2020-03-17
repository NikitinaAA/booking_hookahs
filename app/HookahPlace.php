<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HookahPlace extends Model
{
    protected $table = 'hookah_place';

    protected $fillable = ['name'];

    public function hookahs()
    {
        return $this->hasMany(Hookah::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
}
