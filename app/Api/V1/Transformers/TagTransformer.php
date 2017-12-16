<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 17/12/17
 * Time: 1:06 AM
 */

namespace App\Api\V1\Transformers;


use App\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
    public function transform(Tag $tag)
    {
        return [
            'id' => (int)$tag->id,
            'slug' => $tag->slug,
            'value' => $tag->value,
            'created_at' => $tag->created_at->toDateTimeString(),
            'updated_at' => $tag->updated_at->toDateTimeString()
        ];
    }
}