<?php

namespace App\Models\Currencies;

class Exchange
{
    public $symbol;
    public $price;

    public function __construct($symbol, $price)
    {
        $this->symbol = $symbol;
        $this->price  = $price;
    }
}
