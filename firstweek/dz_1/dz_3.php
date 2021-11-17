<?php
$age = rand(0,99);
if($age >= 18 && $age <= 65){
    echo 'Вам еще работать и работать';
} elseif ($age <= 17 && $age >= 1) {
    echo 'Вам ещё рано работать';
} elseif ($age > 65) {
    echo 'Вам пора на пенсию';
} elseif ($age < 1) {
    echo 'Неизвестный возраст';
}