<?php
/**
 * Created by PhpStorm.
 * User: pragati
 * Date: 8/12/17
 * Time: 12:17 AM
 */

namespace App\Services;


use App\Contracts\ExperienceCreateContract;
use App\Contracts\ExperienceUpdateContract;
use App\Experience;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExperienceService
{
    public static function find($id)
    {
        $experience = Experience::find($id);

        if (is_null($experience)) {
            throw new NotFoundHttpException('Experience Not found!');
        }

        return $experience;
    }

    public function create(ExperienceCreateContract $contract, User $user)
    {

        $experience = new Experience();

        $experience->organisation_name  =   $contract->getOrganisationName();
        $experience->user_id            =   $user->id;
        $experience->designation        =   $contract->getDesignation();

        if ($contract->hasDescription()) {
            $experience->description    =   $contract->getDescription();
        }
        $experience->from               =   $contract->getFrom();
        $experience->location           =   $contract->getLocation();

        if ($contract->hasTo()) {
            $experience->to             =   $contract->getTo();
        }

        $experience->save();

        return $experience;
    }

    public function update(ExperienceUpdateContract $contract, $experience)
    {

        $experience = ExperienceService::find($experience);


        if($contract->hasOrganisationName()){
            $experience->organisation_name  =   $contract->getOrganisationName();
        }

        if ($contract->hasDesignation()){
            $experience->designation        =   $contract->getDesignation();
        }

        if ($contract->hasDescription()){
            $experience->description    =   $contract->getDescription();
        }

        if($contract->hasFrom()){
            $experience->from               =   $contract->getFrom();
        }

        if($contract->hasTo()){
            $experience->to             =   $contract->getTo();
        }

        if($contract->hasLocation()){
            $experience->location           =   $contract->getLocation();
        }



        $experience->save();

        return $experience;

    }

    public function delete($experience)
    {
        $experience = ExperienceService::find($experience);

        $experience->delete();
    }


}