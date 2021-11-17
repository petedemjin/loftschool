<?php
$bmw = [
    'model'=>'X5',
    'speed'=>120,
    'doors'=>5,
    'year'=>2015
];
$toyota = [
    'model'=>'Rav4',
    'speed'=>110,
    'doors'=>5,
    'year'=>2011
];
$opel  = [
    'model'=>'Zafira',
    'speed'=>90,
    'doors'=>5,
    'year'=>1999
];
$arr = [
    'bmw'=>$bmw,
    'toyota'=>$toyota,
    'opel'=>$opel
];

foreach ($arr as $key=>$value) {
    echo 'CAR ' . $key . '<br>';
    echo $value['model'] . ' ' . $value['speed'] . ' ' . $value['doors'] . ' ' . $value['year'] . '<br>';
}
