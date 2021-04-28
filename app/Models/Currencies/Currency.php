<?php

namespace App\Models\Currencies;

class Currency
{
    protected $map = [
        'name'    => 'name',
        'symbol'  => 'symbol',
        'slug'    => 'slug',
        'rank'    => 'cmc_rank',
        'supply'  => \App\Models\Currencies\Supply::class,
        'quotes'  => [
            'key'   => 'quote',
            'class' => \App\Models\Currencies\Quote::class,
        ],
        'updated' => 'last_updated',
    ];
    protected $dates = ['updated'];

    public $id;
    public $name;
    public $symbol;
    public $slug;
    public $rank;
    public $supply;
    public $quotes;
    public $updated;

    public function __construct($id, $data, $map = null, $dates = null)
    {
        $this->id    = $id;
        $this->map   = array_merge($this->map ?: [], $map ?: []);
        $this->dates = array_merge($this->dates ?: [], $dates ?: []);
        $this->constructFromData($data);
    }

    private function constructFromData($data)
    {
        foreach ($this->map as $prop => $mapped) {
            $propValue;
            if (is_array($mapped)) {
                $propValue = [];
                $class     = $mapped['class'];
                foreach ($data[$mapped['key']] as $k => $v) {
                    $propValue[$k] = new $class($k, $v);
                }
            } else if (class_exists($mapped)) {
                $propValue = new $mapped($data);
            } else if (in_array($prop, $this->dates)) {
                $propValue = \Carbon\Carbon::createFromTimestamp($data[$mapped]);
            } else {
                $propValue = $data[$mapped];
            }

            $this->$prop = $propValue;
        }
    }
}
