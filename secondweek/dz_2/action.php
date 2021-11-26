<pre>
<?php
require __DIR__ . '/functions.php';

$adress = $_POST['street'] ?? '';
$adress = trim($adress . ' ' . ($_POST['home'] ?? ''));
$adress = trim($adress . ' ' . ($_POST['part'] ?? ''));
$adress = trim($adress . ' ' . ($_POST['appt'] ?? ''));
$adress = trim($adress . ' ' . ($_POST['floor'] ?? ''));

$phone = (isset($_POST['phone']) ? $_POST['phone'] : '');
$comment = (isset($_POST['comment']) ? $_POST['comment'] : '');
$payment = (isset($_POST['payment1']) ? 1 : 0) + (isset($_POST['payment1']) ? 1 : 0);
$callback = (isset($_POST['callback']) ? 1 : 0);
echo '<br>';

//var_dump($phone);die;
if(isset($_POST['email']) and select($_POST['email'])){
    $counter = select($_POST['email'])['0']['counter'] + 1;
    $data = [
        ':counter'=>$counter,
        ':id'=>select($_POST['email'])['0']['id']
    ];
    $sql = 'UPDATE customer SET counter =:counter WHERE id =:id';
    query($sql, $data);
}else{
    $sql = 'INSERT INTO customer (cname, email, counter) VALUES (:cname, :email, :counter)';
    $data = [
        ':cname'=>$_POST['name'],
        ':email'=>$_POST['email'],
        ':counter'=>1
    ];
    query($sql, $data);
}
$id_customer = select($_POST['email'])['0']['id'];
if(isset($_POST['email']) and !empty($adress)){
    $sqlOrder = 'INSERT INTO orders 
                (id_customer, phone, address, comment, cash, callback, date_order) 
                VALUES 
                (:id_customer, :phone, :address, :comment, :cash, :callback, :date_order)';
    $dataOrder = [
        ':id_customer'=>$id_customer,
        ':phone'=>$phone,
        ':address'=>$adress,
        ':comment'=>$comment,
        ':cash'=>$payment,
        ':callback'=>$callback,
        ':date_order'=>date("Y-m-d H:i:s")
    ];
    $id_order = query($sqlOrder, $dataOrder);

    $counter = isset($counter) ? $counter : 1;
    echo 'Спасибо, ваш заказ будет доставлен по адресу: ' . $adress . '<br>' .
    'Номер вашего заказа: ' . $id_order . '<br>' .
    'Это ваш ' . $counter  . '-й заказ!';
}