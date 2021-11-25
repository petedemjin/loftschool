<pre>
<?php
require __DIR__ . '/function.php';

$arrName = ['Jack', 'Rassel', 'Born', 'Robson', 'Joe'];
$arrUsers = [];
for($i = 0; $i < 50; $i++){
    $arrUsers[$i] = [
        'id'=>$i,
        'name'=>$arrName[rand(0,4)],
        'age'=>rand(18,45)
    ];
}
task1($arrUsers);
echo '<br>';
var_dump(task2());
echo '<br> Частота встречи имен: <br>';
foreach (task3() as $key=>$value){
    echo 'Имя ' . $key . ' встречается ' . $value . ' раз. <br>';
}
echo '<br> Средний возраст пользователей: ' . task4();