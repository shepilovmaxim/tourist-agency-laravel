<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = [];

    public function tour() {
        return $this->hasOne(Tour::class);
    }
}
