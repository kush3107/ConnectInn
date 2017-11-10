<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ActivityRequest
 *
 * @property int $id
 * @property int $activity_id
 * @property int $sender_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Activity $activity
 * @property-read \App\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityRequest whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityRequest whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
