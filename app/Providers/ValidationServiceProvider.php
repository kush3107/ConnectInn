<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:44 PM
 */

namespace App\Providers;

use Curl\Curl;
use DateTime;
use Illuminate\Support\ServiceProvider;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;
use Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('phone_number', function($attribute, $value, $parameters, $validator) {
            $phoneUtil = PhoneNumberUtil::getInstance();
            try {
                $contactNumber = $phoneUtil->parse($value, null);
                $isValid = $phoneUtil->isValidNumber($contactNumber);
            } catch (NumberParseException $e) {
                return false;
            }
            return $isValid;
        });

        Validator::extend('latitude', function($attribute, $value)
        {
            return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', $value);
        });

        Validator::extend('longitude', function($attribute, $value)
        {
            return preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $value);
        });

        Validator::extend('date_string', function($attribute, $value)
        {
            if ($value instanceof DateTime) {
                return true;
            }

            return !(strtotime($value) === false);
        });

        Validator::extend('image_url', function($attribute, $value)
        {
            $mimeTypes = [
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/bmp',
                'image/x-windows-bmp'
            ];

            $curl = new Curl($value);
            $curl->setOpt(CURLOPT_NOBODY, 1);
            $curl->setOpt(CURLOPT_FAILONERROR, 1);

            $curl->exec();

            $contentLength = $curl->responseHeaders['content-length'];
            $contentType = $curl->responseHeaders['content-type'];

            if (is_null($contentLength) || $contentLength == 0) {
                return false;
            }

            return in_array((string) $contentType, $mimeTypes);
        });

        Validator::extend('valid_json', function($attribute, $value)
        {
            $jsonObj = json_decode($value);

            if (json_last_error() === JSON_ERROR_NONE) {
                // JSON is valid
                return true;
            }

            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}