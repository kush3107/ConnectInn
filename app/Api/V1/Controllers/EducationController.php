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
use App\Api\V1\Transformers\EducationTransformer;
use App\Services\EducationService;
use Auth;

class EducationController extends Controller
{
    protected $educationService;

    public function __construct()
    {
        $this->educationService = new EducationService();
    }

    public function index()
    {
        return $this->response->collection(Auth::user()->educations, new EducationTransformer());
    }

    public function store(EducationCreateRequest $request)
    {
        $education = $this->educationService->create($request, Auth::user());

        return $this->response->item($education, new EducationTransformer());
    }

    public function update(EducationUpdateRequest $request, $education)
    {

        $educationUpdate = $this->educationService->update($request, $education);

        return $this->response->item($educationUpdate, new EducationTransformer());
    }

    public function destroy($education)
    {
        $this->educationService->delete($education);
    }

}