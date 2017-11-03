<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 04/11/17
 * Time: 12:56 AM
 */

namespace App\Api\V1\Requests;


use Dingo\Api\Http\FormRequest;

class Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

        ];
    }
}