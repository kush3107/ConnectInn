<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 18/12/17
 * Time: 7:10 PM
 */

namespace App\Api\V1\Transformers;


use App\ActivityRequest;
use League\Fractal\TransformerAbstract;

class ActivityRequestTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'sender'
    ];

    public function transform(ActivityRequest $request)
    {
        return [
            'id' => (int)$request->id,
            'activity_id' => (int)$request->activity_id,
            'sender_id' => (int)$request->sender_id,
            'created_at' => $request->created_at->toDateTimeString(),
            'updated_at' => $request->updated_at->toDateTimeString()
        ];
    }

    public function includeSender(ActivityRequest $request)
    {
        return $this->item($request->sender, new UserTransformer());
    }
}