<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 17/12/17
 * Time: 12:47 AM
 */

namespace App\Api\V1\Controllers;


use App\Attribute;

class AttributeController extends Controller
{
    public function destroy($attribute)
    {
        $attribute = Attribute::findOrFail($attribute);

        $attribute->delete();
    }
}