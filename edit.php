<?php
   require_once 'connection.php';
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Обнаружена ошибка в подключении к базе данных. Будь умницей, исправь, пока не поздно" . mysqli_error());
    $query = "SELECT order_cost FROM sales";
    $result = mysqli_query($link, $query);
    
?>
<!DOCTYPE html>
<html>
<body>
<form method='GET' action='result.php'>
<input type='hidden' name='id_order' value='<?=@$_GET['id_order']?>'>
<table border='1'>
<tr>
<th>id_order</th>
<th>id_product</th>
<th>id_client</th>
<th>order_quantity</th>
<th>departure_date</th>
<th>order_cost</th>
</tr>
<tr>
<td><input type='int' name='id_order' value='<?=@$_GET['id_order']?>'></td>
<td><input type='int' name='id_product' value='<?=@$_GET['id_product']?>'></td>
<td><input type='int' name='id_client' value='<?=@$_GET['id_client']?>'></td>
<td><input type='int' name='order_quantity' value='<?=@$_GET['order_quantity']?>'></td>
<td><input type='date' name='departure_date' value='<?=@$_GET['departure_date']?>'></td>
<td><select name='order_cost'>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                if ($row['order_cost'] == $_GET['sales'])
                    echo "<option selected value='" . $row['order_cost'] . "'>" . $row['order_cost'] . "</option>";
                else
                    echo "<option value='" . $row['order_cost'] . "'>" . $row['order_cost'] . "</option>";
            }
            ?>
        </select></td>
</tr>
</table>
<p><input type='SUBMIT' name='ENTER' value='SUBMIT CHANGES'></p>
</form>
</body>
</html>

