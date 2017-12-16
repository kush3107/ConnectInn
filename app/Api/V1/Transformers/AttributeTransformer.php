<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 17/12/17
 * Time: 12:43 AM
 */

namespace App\Api\V1\Transformers;


use App\Attribute;
use League\Fractal\TransformerAbstract;

class AttributeTransformer extends TransformerAbstract
{
    public function transform(Attribute $attribute) {
        return [
            'id' => (int)$attribute->id,
            'type' => $attribute->type,
            'value' => $attribute->value,
            'created_at' => $attribute->created_at->toDateTimeString(),
            'updated_at' => $attribute->updated_at->toDateTimeString()
        ];
    }
}