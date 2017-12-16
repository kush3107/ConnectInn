<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Experience
 *
 * @property int $id
 * @property int $user_id
 * @property string $organisation_name
 * @property string $designation
 * @property string|null $description
 * @property \Carbon\Carbon $from
 * @property \Carbon\Carbon|null $to
 * @property string|null $location
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereOrganisationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Experience whereUserId($value)
 * @mixin \Eloquent
 */
class Experience extends Model
{
    protected $table = 'experiences';

    protected $dates = [
        'from',
        'to',
        'created_at',
        'updated_at'
    ];

    //
    public function user(){
        $this->belongsTo(User::class);
    }
}
