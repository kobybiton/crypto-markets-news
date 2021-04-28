<?php

namespace App\Models\Currencies;

class Supply
{
    protected $map = [
        'current' => 'circulating_supply',
        'total'   => 'total_supply',
        'max'     => 'max_supply',
    ];

    public $current;
    public $total;
    public $max;

    public function __construct($data, $map = null)
    {
        $this->map = array_merge($this->map ?: [], $map ?: []);
        foreach ($this->map as $prop => $mapped) {
            $this->$prop = $data[$mapped];
        }
    }
}
