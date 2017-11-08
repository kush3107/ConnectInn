<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:51 PM
 */

namespace App\Api\V1\Requests;


class UserAddProfilePicRequest extends Request
{
    const IMAGE = 'image';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: need to setup access roles in future. Return true in all Requests for now.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            self::IMAGE => 'required|image|max:10240'
        ];
    }

    public function getImage() {
        return $this->file(self::IMAGE);
    }
}