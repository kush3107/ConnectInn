<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityRequest extends Model
{
    //
    public function sender(){

        return $this->belongsTo(User::class,'sender_id');
    }

    public function activity(){

        return $this->belongsTo(Activity::class);
    }

}
