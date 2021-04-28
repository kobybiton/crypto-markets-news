<?php

namespace App\Models\Currencies;

class Quote
{
    protected $map = [
        'price'     => 'price',
        'volume24h' => 'volume_24h',
        'marketcap' => 'market_cap',
        'change1h'  => 'percent_change_1h',
        'change24h' => 'percent_change_24h',
        'change7d'  => 'percent_change_7d',
    ];

    public $name;
    public $price;
    public $volume24h;
    public $marketcap;
    public $change1h;
    public $change24h;
    public $change7d;

    public function __construct($name, $data, $map = null)
    {
        $this->name = $name;
        $this->map  = array_merge($this->map ?: [], $map ?: []);
        foreach ($this->map as $prop => $mapped) {
            $this->$prop = $data[$mapped];
        }
    }

    public function formattedPrice()
    {
        $priceSplit = explode('.', "$this->price");
        $prefix     = $priceSplit[0];
        $suffix     = count($priceSplit) > 1 ? $priceSplit[1] : '';
        $delta      = strlen($prefix) + strlen($suffix) - 10;
        if ($delta > 0 and strlen($suffix)) {
            $suffix = substr($suffix, 0, strlen($suffix) - $delta);
        }
        return strlen($suffix) ? number_format($prefix) . ".$suffix" : number_format($prefix);
    }
}
