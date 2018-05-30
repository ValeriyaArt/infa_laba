<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Обнаружена ошибка в подключении к базе данных. Будь умницей, исправь, пока не поздно" . mysqli_error());
    

    $id_order = (int)$_GET['id_order'];
	$id_product = $_GET['id_product'];
    $id_client = $_GET['id_client'];
    $order_quantity = $_GET['order_quantity'];
    $departure_date = $_GET['departure_date'];
    $departure_cost = $_GET['departure_cost'];

    $update1="UPDATE sales
    SET id_product='$id_product', id_client='$id_client', id_client='$id_client', order_quantity='$order_quantity', departure_date='$departure_date', departure_cost='$departure_cost',
    WHERE id_order = $id_order";
    $result1= mysqli_query($link, $update1);
    $update2="UPDATE departure_cost
    SET departure_cost='$departure_cost'
    WHERE id_order = $id_order";
    $result2= mysqli_query($link, $update2);

?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>
