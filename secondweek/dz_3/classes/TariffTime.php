<?php


class TariffTime extends TarifAbstract
{
    protected $pricePerKm = 0;
    protected $pricePerTime = 200 / 60;

    public function __construct($time, $km, $sevrice)
    {
        parent::__construct($time, $km, $sevrice);
        $this->time = $this->time - $this->time % 60 + 60;
    }
}