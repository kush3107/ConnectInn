<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:41 PM
 */

namespace App\Facades;

use App\Services\S3Service;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Uploader
 *
 * @method static upload(UploadedFile $file, $relativeUrl, $privacy = 'public')
 *
 * @package App\Facades
 */
class Uploader extends Facade
{
    protected static function getFacadeAccessor()
    {
        return S3Service::class;
    }
}