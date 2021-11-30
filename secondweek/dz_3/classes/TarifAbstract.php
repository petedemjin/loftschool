<?php

abstract class TarifAbstract implements PriceСalculation
{
    protected $time;
    protected $km;
    protected $sevrice = [];

    public function __construct($time, $km, $sevrice)
    {
        $this->time = $time;
        $this->km = $km;
        $this->sevrice = $sevrice;
    }

    public function price(): int
    {
        foreach ($this->sevrice as $value){
            if($value == 'GPS'){
                $hours = ceil($this->time / 60);
                $priceGPS = 15 * $hours;
            }

            if($value == 'Driver'){
                $priceDrive = 100;
            }
        }

        $price = $this->km * $this->pricePerKm + $this->pricePerTime * $this->time + ($priceGPS ?? 0) + ($priceDrive ?? 0);
        return $price;
    }

}