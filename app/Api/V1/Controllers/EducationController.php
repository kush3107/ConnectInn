<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 14/11/17
 * Time: 4:36 PM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\EducationCreateRequest;
use App\Api\V1\Requests\EducationUpdateRequest;
use App\Services\EducationService;
use Auth;

class EducationController extends Controller
{
    protected $educationService;

    public function __construct()
    {
        $this->educationService = new EducationService();
    }

    public function store(EducationCreateRequest $request){

        $education = $this->educationService->create($request,Auth::user());

        return $education;

    }

    public function update(EducationUpdateRequest $request,$education){

        $educationUpdate  = $this->educationService->update($request,$education);

        return $educationUpdate;

    }

    public function delete($education){

        $this->educationService->delete($education);


    }

}