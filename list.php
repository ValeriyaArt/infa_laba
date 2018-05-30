<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Обнаружена ошибка в подключении к базе данных. Будь умницей, исправь, пока не поздно" . mysqli_error());

echo "Подключение состоялось!<br>";

$sql ="SELECT * FROM sales";

if (mysqli_query($link, $sql)) {
  echo "Юхуху. У нас всё получилось!!!";
} else {
  echo "Ты дебил. Ты не достоин даже тройки: " . mysqli_error($link);
}


$result = mysqli_query($link, $sql);

echo "<table border='1'>
<tr> 
<th>id_order</th>
<th>id_product</th>
<th>id_client</th>
<th>order_quantity</th>
<th>departure_date</th>
<th>order_cost</th>
<th>edit</th>
<th>delete</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $id_order = $row['id_order'];
    $id_product = $row['id_product'];
    $id_client = $row['id_client'];
    $order_quantity = $row['order_quantity'];
    $departure_date = $row['departure_date'];
    $order_cost = $row['order_cost'];
echo "<tr>";
echo "<td>" . $id_order . "</td>";
echo "<td>" . $id_product . "</td>";
echo "<td>" . $id_client . "</td>";
echo "<td>" . $order_quantity . "</td>";
echo "<td>" . $departure_date . "</td>";
echo "<td>" . $order_cost . "</td>";
echo "<td><a href='edit.php?id_order=$id_order&id_product=$id_product&id_client=$id_client&order_quantity=$order_quantity&departure_date=$departure_date&order_cost=$order_cost'>edit</a><br></td>";
echo "<td><a href = './delete.php?id_order=$id_order'>delete</a></td>";
echo "</tr>";
}

echo "</table>";

mysqli_close($link);

?>
