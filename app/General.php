<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public static function xss_clean($input){

        $config = \HTMLPurifier_Config::createDefault();
        $purifier = new \HTMLPurifier($config);
        $input = $purifier->purify($input);

        return $input;
    }

    public static function friendly_url($url){

        $url = trim($url);
        $url = html_entity_decode($url);
        $url = strip_tags($url);
        $url = strtolower(preg_replace('~[/:*%$?"#<>|]~', '', $url));
        $url = preg_replace('~ ~', '-', $url);
        $url = preg_replace('~-+~', '-', $url);
        $url = str_replace(' ', '-', $url);

        return $url;
    }

}
