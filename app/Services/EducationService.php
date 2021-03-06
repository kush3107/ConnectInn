<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 14/11/17
 * Time: 4:37 PM
 */

namespace App\Services;


use App\Contracts\EducationCreateContract;
use App\Contracts\EducationUpdateContract;
use App\Education;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EducationService
{
    public static function find($id)
    {
        $education = Education::find($id);

        if (is_null($education)) {
            throw new NotFoundHttpException('Education Not found!');
        }

        return $education;
    }

    public function create(EducationCreateContract $contract, User $user)
    {

        $education = new Education();

        $education->school      = $contract->getSchool();
        $education->user_id     = $user->id;
        $education->degree      = $contract->getDegree();
        $education->grade_type  = $contract->getGradeType();
        $education->grade       = $contract->getGrade();
        $education->location    = $contract->getLocation();
        $education->start       = $contract->getStart();
        $education->end         = $contract->getEnd();

        $education->save();

        return $education;
    }

    public function update(EducationUpdateContract $contract, $education)
    {

        $education = EducationService::find($education);

        if ($contract->hasSchool()) {
            $education->school = $contract->getSchool();
        }

        if($contract->hasDegree()){
            $education->degree      = $contract->getDegree();
        }

        if($contract->hasGrade()){
            $education->grade       = $contract->getGrade();
        }

        if($contract->hasGradeType()){
            $education->grade_type  = $contract->getGradeType();
        }

        if($contract->hasStart()){
            $education->start       = $contract->getStart();
        }

        if($contract->hasEnd()){
            $education->end         = $contract->getEnd();

        }

        $education->save();

        return $education;

    }

    public function delete($education)
    {
        $education = EducationService::find($education);

        $education->delete();
    }

}