<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Обнаружена ошибка в подключении к базе данных. Будь умницей, исправь, пока не поздно" . mysqli_error());
    

    $id_order = (int)$_GET['id_order'];
    $order_quantity = $_GET['order_quantity'];
    $departure_date = $_GET['departure_date'];
    $order_cost = $_GET['order_cost'];

    $update1="UPDATE sales
    SET order_quantity='$order_quantity', departure_date='$departure_date', order_cost='$order_cost'
    WHERE id_order = $id_order";
    $result1= mysqli_query($link, $update1);

?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>
