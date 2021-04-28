<?php

namespace App\Models\Currencies;

class Currencies
{
    protected const CACHE_KEY = 'currencies';

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
        \Cache::put(static::CACHE_KEY, static::currenciesFromUrl(), 2);
    }

    public static function currenciesFromUrl()
    {
        $currencies = collect();
        include 'coins_description.php';
        include 'currencies_backup.php';
        $json = $currencies_backup;

        foreach($json as $id => $data){
            $currencies->push(new Currency($id, $data));
        }

        foreach($coins_description as $i => $coin_description) {

            if($currencies) {
                foreach($currencies as $key => $currency){

                    if($coins_description[$i]['name'] == $currencies[$key]->name){
                        $currencies[$key]->description = $coins_description[$i]['description'];
                        break;
                    }
                    $change24h = $currency->quotes['USD']->change24h;
                    $currencies[$key]->change24h = $change24h;
                }
            }
        }

        //$currencies[$key]->description = 'N/A';
        return $currencies->sortBy('rank');
    }
}
