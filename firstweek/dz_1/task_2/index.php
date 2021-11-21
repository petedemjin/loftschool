<?php
require __DIR__ . '/function.php';

echo 'Задание #1' . '<br>';
$array = [
    'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.',
    'Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum',
    'Есть много вариантов Lorem Ipsum'
];
var_dump(task1($array,true));

echo '<br>' . '<br>' . 'Задание #2' . '<br>';
echo task2('+', 0, 2, 3,);

echo '<br>' . '<br>' . 'Задание #3' . '<br>';
echo task3(5, 10,);

echo '<br>' . '<br>' . 'Задание #4' . '<br>';
$today = date("d.m.Y. G:i");
echo $today . '<br>';
echo strtotime("24.02.2016 00:00:00");

echo '<br>' . '<br>' . 'Задание #5' . '<br>';
$str1 = 'Карл у Клары украл Кораллы';
$str1 = str_replace('К', '', $str1);
echo $str1;
echo '<br>';
$str2 = 'Две бутылки лимонада';
$str2 = str_replace('Две', 'Три', $str2);
echo $str2;

echo '<br>' . '<br>' . 'Задание #6' . '<br>';
$data = 'Hello again!';
file_put_contents(__DIR__ . '/test.txt', $data);
echo task6();