<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 08/11/17
 * Time: 12:49 PM
 */

namespace App;


use Carbon\Carbon;

class Helpers
{
    /**
     * Generates a unique string of given length
     *
     * @param int $length
     * @param string $start
     * @return string
     */
    public static function generateUniqueId($length = 9, $start = 'z')
    {
        return $start . strtolower(str_random($length - 1));
    }

    /**
     * Generates a unique pin of given length
     *
     * @param int $digits
     * @return string
     */
    public static function generatePin($digits = 6)
    {
        $pin = "";
        for ($i = 0; $i < $digits; $i++) {
            $pin .= mt_rand(0, 9);
        }

        return $pin;
    }

    /**
     * Return null or casted int
     *
     * @param $value
     * @return int|null
     */
    public static function nullOrInteger($value)
    {
        return ($value === null) ? null : (integer)$value;
    }

    /**
     * Return null or casted bool
     *
     * @param $value
     * @return bool|null
     */
    public static function nullOrBool($value)
    {
        return ($value === null) ? null : (bool)$value;
    }

    /**
     * Return null or string
     *
     * @param $value
     * @return null|string
     */
    public static function nullOrDateTimeString($value)
    {
        if (! $value instanceof Carbon && !is_null($value)) {
            $value = Carbon::parse($value);
        }

        return is_null($value) ? null : $value->toDateTimeString();
    }

    /**
     * Return null or casted double
     *
     * @param $value
     * @return float|null
     */
    public static function nullOrDouble($value)
    {
        return ($value === null) ? null : (double)$value;
    }

    public static function getFullName($firstName, $lastName = "") {
        return $lastName === "" ? $firstName : $firstName . ' ' . $lastName;
    }

    public static function hasSubString($hayStack, $niddle, $caseSensitive = false) {
        if(!$caseSensitive) {
            $hayStack = strtolower($hayStack);
            $niddle = strtolower($niddle);
        }

        return strpos($hayStack, $niddle) !== false;
    }

    public static function timeStampToDateString($timestamp) {
        return date('d F Y', $timestamp);
    }

    public static function timeStampToDateTimeString($timestamp) {
        return date('d F Y H:i:s', $timestamp);
    }
}