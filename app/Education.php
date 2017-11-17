<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Education
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $school
 * @property string $degree
 * @property string $field_of_study
 * @property string $grade_type
 * @property int $grade
 * @property string $location
 * @property string $start
 * @property string|null $end
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereFieldOfStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereGradeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereUserId($value)
 */
class Education extends Model
{
    protected $table = 'educations';

    //
    public function users(){
        $this->belongsTo(User::class);
    }
}
