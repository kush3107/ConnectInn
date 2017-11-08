<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Invitation
 *
 * @property int $id
 * @property int $activity_id
 * @property int $sender_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Activity $activity
 * @property-read \App\User $receiver
 * @property-read \App\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invitation whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invitation whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invitation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invitation whereUserId($value)
 * @mixin \Eloquent
 */
class Invitation extends Model
{
    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
