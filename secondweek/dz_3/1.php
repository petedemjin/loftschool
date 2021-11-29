<?php
require_once __DIR__ . '/classes/PriceСalculation.php';
require_once __DIR__ . '/classes/TarifAbstract.php';
require_once __DIR__ . '/classes/TariffBase.php';
require_once __DIR__ . '/classes/TariffTime.php';
require_once __DIR__ . '/classes/TariffStudent.php';

$tarif = new TariffBase(18,4, ['GPS', 'Driver']);
echo $tarif->price() . 'Базовый тариф' . '<br>';
$tarif = new TariffTime(121,12, ['Driver']);
echo $tarif->price() . 'Почасовой тариф' . '<br>';
$tarif = new TariffStudent(121,12, ['GPS']);
echo $tarif->price() . 'Студенческий тариф' . '<br>';
