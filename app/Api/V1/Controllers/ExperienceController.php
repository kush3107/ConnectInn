<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 19/11/17
 * Time: 1:46 AM
 */

namespace App\Api\V1\Controllers;


use App\Api\V1\Requests\ExperienceCreateRequest;
use App\Api\V1\Requests\ExperienceUpdateRequest;
use App\Api\V1\Transformers\ExperienceTransformer;
use App\Services\ExperienceService;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    protected $experienceService;

    public function __construct()
    {
        $this->experienceService = new ExperienceService();
    }

    public function index()
    {
        return $this->response->collection(Auth::user()->experiences, new ExperienceTransformer());
    }

    public function store(ExperienceCreateRequest $request)
    {


        $experience = $this->experienceService->create($request, Auth::user());

        return $this->response->item($experience, new ExperienceTransformer());

    }

    public function update(ExperienceUpdateRequest $request, $experience)
    {

        $experienceUpdate = $this->experienceService->update($request, $experience);

        return $this->response->item($experienceUpdate, new ExperienceTransformer());
    }

    public function destroy($experience)
    {
        $this->experienceService->delete($experience);
    }


}