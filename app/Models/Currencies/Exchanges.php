<?php

namespace App\Models\Currencies;

class Exchanges
{
    protected const CACHE_KEY = 'exchanges';

    private static $exchanges = [
        'USD' => 'http://free.currencyconverterapi.com/api/v6/convert?q=USD_USD&compact=y',
        'EUR' => 'http://free.currencyconverterapi.com/api/v6/convert?q=USD_EUR&compact=y',
        'GBP' => 'http://free.currencyconverterapi.com/api/v6/convert?q=USD_GBP&compact=y',
        'AUD' => 'http://free.currencyconverterapi.com/api/v6/convert?q=USD_AUD&compact=y'
    ];

    private static $all;

    public static function all()
    {
        return static::$all ?: (static::$all = static::cached());
    }

    private static function cached()
    {
        if (!\Cache::has(static::CACHE_KEY)) {
            static::cache();
        }

        return \Cache::get(static::CACHE_KEY);
    }

    private static function cache()
    {
        \Cache::put(static::CACHE_KEY, static::exchangesFromUrl(), 1);
    }

    private static function exchangesFromUrl()
    {
        $exchanges = [];
        foreach(static::$exchanges as $symbol => $url){
            $exchanges[] = new Exchange($symbol, array_values(json_decode(file_get_contents($url), true))[0]['val']);
        }

        return $exchanges;
    }
}
