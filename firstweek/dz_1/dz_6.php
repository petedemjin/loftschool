<?php
echo ' <table border="1" style=" border-spacing: 0; ">';
for($i = 1; $i <= 10; $i++){
    echo '<tr align="center" height="50x">';
    for($j = 1; $j <= 10; $j++){
        if($i % 2 === 0 && $j % 2 === 0){
            echo '<td width="50px">' . '(' . $i * $j . ')' . '</td>';
        } elseif ($i % 2 !== 0 && $j % 2 !== 0) {
            echo '<td width="50px">' . '[' . $i * $j . ']' . '</td>';
        }else {
            echo '<td width="50px">' . $i * $j . '</td>';
        }
    }
    echo '<tr>';
}
echo ' </table>';

