<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compliment extends Model
{
    public function receivedFrom() {
        return $this->hasOne('App\User', 'id', 'from_id');
    }

    public function sentTo() {
        return $this->hasOne('App\User', 'id', 'to_id');
    }

    public function timeDiff($time) {
        $end = Carbon::parse($time);
        $now = Carbon::now();

        $length = $end->diffInDays($now);

        return $length;
    }
}
