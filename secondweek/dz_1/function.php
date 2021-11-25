<?php
function task1($array)
{
    $usersEncode = json_encode($array);
    return file_put_contents(__DIR__ . '/users.json', $usersEncode);
}

function task2()
{
    $usersDecode = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    return $usersDecode;
}

function task3()
{
    $arrResult = [];
    foreach (task2() as $value){
        if(array_key_exists($value['name'], $arrResult)){
            $arrResult[$value['name']] = $arrResult[$value['name']] + 1;
        }else{
            $arrResult[$value['name']] = 1;
        }
    }
    return $arrResult;
}

function task4()
{
    $i = 0;
    $sum = 0;
    foreach (task2() as $value){
        $i++;
        $sum = $sum + $value['age'];
    }
    return $sum / $i;
}