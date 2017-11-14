<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    public function users(){
        $this->belongsTo(User::class);
    }
}
