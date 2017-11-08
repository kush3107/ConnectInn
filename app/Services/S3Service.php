<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:40 PM
 */

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class S3Service
{
    public function upload(UploadedFile $file, $relativeUrl, $privacy = 'public') {
        $fullUrl = $this->uploadContent(file_get_contents($file->getRealPath()), $relativeUrl, $privacy);

        return $fullUrl;
    }

    public function uploadContent($content, $relativeUrl, $privacy) {
        //TODO check if file already not exists on given URL

        $upload = Storage::disk('s3')->put($relativeUrl, $content, $privacy);

        if (!$upload) {
            throw new \Exception;
            //TODO throw proper exception here
            //TODO move the file to local storage and upload to s3 later on
        }

        $baseURL = 'https://s3-' . Config::get('filesystems.disks.s3.region') . '.amazonaws.com/' . Config::get('filesystems.disks.s3.bucket') . '/';
        $fullURL = $baseURL . $relativeUrl;

        return $fullURL;
    }
}