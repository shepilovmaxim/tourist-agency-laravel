<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function voucher() {
        return $this->hasMany(Voucher::class);
    }
}
