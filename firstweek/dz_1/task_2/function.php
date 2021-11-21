<?php
function task1(array $myArr, $flag)
{
    foreach ($myArr as $value){
        if($flag === true ){
            echo '<p>' . $value . '</p>';
        }elseif ($flag === false){
            return implode(' ',$myArr);
        }
    }
}

function task2()
{
    $arifm = ['+', '-', '*', '/'];
    $resultMath = func_get_arg(1);
    $result = func_get_arg(1);
    if(in_array(func_get_arg(0), $arifm) && (is_float(func_get_arg(1)) || is_int(func_get_arg(1)))){
        for ($i = 2; $i < func_num_args(); $i++){
            if(!is_int(func_get_arg($i)) && !is_float(func_get_arg($i))){
                return 'Все элементы массива со второго должны быть числами!';
            }
            switch (func_get_arg(0)) {
                case '+':
                    $resultMath = $resultMath + func_get_arg($i);
                    break;
                case '-':
                    $resultMath = $resultMath - func_get_arg($i);
                    break;
                case '*':
                    $resultMath = $resultMath * func_get_arg($i);
                    break;
                case '/':
                    if(func_get_arg($i) == 0 && func_get_arg(0) == '/'){
                        return 'Деление на ноль запрещено';
                    }
                    $resultMath = $resultMath / func_get_arg($i);
                    break;
                default:
                    return 'Операция не поддерживается';
            }
            $result .= ' ' . func_get_arg(0) .' '. func_get_arg($i) .' ';
        }
        $result = $result . ' = ' . round($resultMath, 1);
        return $result;
    }else{
        return 'Неправильно указан арифметический знак или второй элемент массива';
    }
}

function task3($x, $y)
{
    if(is_int($x) && is_int($y)){
        echo ' <table border="1" style=" border-spacing: 0; ">';
        for($i = 1; $i <= $x; $i++){
            echo '<tr align="center" height="50x">';
            for($j = 1; $j <= $y; $j++){
                echo '<td width="50px">' . $i * $j . '</td>';
            }
            echo '<tr>';
        }
        echo ' </table>';
    } else{
        echo 'Введенные значения чисел не являются целыми числами';
    }
}

function task6()
{
    $result = file_get_contents(__DIR__ . '/test.txt');
    return $result;
}