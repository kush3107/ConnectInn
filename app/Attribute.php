<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attribute
 *
 * @property int $id
 * @property int $user_id
 * @property string $value
 * @property string $type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereValue($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Attribute extends Model
{
    protected $fillable = [
        'type',
        'value'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
