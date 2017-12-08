<?php

namespace App;

use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Activity
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property Carbon $start
 * @property Carbon $end
 * @property string $type
 * @property string $link
 * @property mixed $meta
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Invitation[] $invitations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ActivityRequest[] $activityrequests
 */
class Activity extends Model
{
    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at'
    ];

    // Helper Methods

    public function getOwner()
    {
        $owner = $this->users()->wherePivot('is_owner', true)->get();

        return $owner;
    }

    public function isOwner($user)
    {
        if (!$user instanceof User) {
            $user = $user->id;
        }

        return (boolean)$this->users()->wherePivot('user_id', $user->id)->value('is_owner');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot([
            'is_owner',
            'role'
        ])->withTimestamps();
    }

    public function owner() {
        return $this->belongsToMany(User::class)->wherePivot('is_owner', true);
    }

    public function members() {
        return $this->belongsToMany(User::class)->wherePivot('is_owner', false);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function activityrequests(){
        return $this->hasMany(ActivityRequest::class);
    }
}
