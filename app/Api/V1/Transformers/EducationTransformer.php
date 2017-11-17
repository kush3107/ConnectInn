<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 17/11/17
 * Time: 12:19 PM
 */

namespace App\Api\V1\Transformers;


use App\Education;
use App\Helpers;
use League\Fractal\TransformerAbstract;

class EducationTransformer extends TransformerAbstract
{
    public function transform(Education $education) {
        return [
            'id' => (int)$education->id,
            'user_id' => (int)$education->user_id,
            'school' => $education->school,
            'degree' => $education->degree,
            'grade_type' => $education->grade_type,
            'grade' => $education->grade,
            'location' => $education->location,
            'start' => Helpers::nullOrDateTimeString($education->start),
            'end' => Helpers::nullOrDateTimeString($education->end),
            'created_at' => $education->created_at->toDateTimeString(),
            'updated_at' => $education->updated_at->toDateTimeString()
        ];
    }
}