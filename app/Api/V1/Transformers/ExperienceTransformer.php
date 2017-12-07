<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 8/12/17
 * Time: 12:26 AM
 */

namespace App\Api\V1\Transformers;


use App\Experience;
use App\Helpers;
use League\Fractal\TransformerAbstract;

class ExperienceTransformer extends TransformerAbstract
{
    public function transform(Experience $experience)
    {
        return [
            'id' => (int)$experience->id,
            'user_id' => (int)$experience->user_id,
            'organisation_name' => $experience->organisation_name,
            'designation' => $experience->designation,
            'description' => $experience->description,
            'from' => $experience->from->toDateTimeString(),
            'to' => Helpers::nullOrDateTimeString($experience->to),
            'location' => $experience->location,
            'created_at' => $experience->created_at->toDateTimeString(),
            'updated_at' => $experience->updated_at->toDateTimeString()
        ];
    }

}