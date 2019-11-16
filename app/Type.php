<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function tour() {
        return $this->hasMany(Tour::class);
    }
}
