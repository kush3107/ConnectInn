<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 07/11/17
 * Time: 11:54 PM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Transformers\ActivityTransformer;
use App\Services\ActivityService;
use Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = ActivityService::getListsBy(Auth::id());

        return $this->response->collection($activities, new ActivityTransformer());
    }
}