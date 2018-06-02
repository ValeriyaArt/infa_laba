<?php
   require_once 'connection.php';
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Обнаружена ошибка в подключении к базе данных. Будь умницей, исправь, пока не поздно" . mysqli_error());
    $query = "SELECT id_client FROM sales";
    $result = mysqli_query($link, $query);
    
?>
<!DOCTYPE html>
<html>
<body>
<form method='GET' action='result.php'>
<input type='hidden' name='id_order' value='<?=@$_GET['id_order']?>'>
<table border='1'>
<tr>
<th>order_quantity</th>
<th>departure_date</th>
<th>order_cost</th>
</tr>
<td><input type='int' name='order_quantity' value='<?=@$_GET['order_quantity']?>'></td>
<td><input type='date' name='departure_date' value='<?=@$_GET['departure_date']?>'></td>
<td><input type='text' name='order_cost' value='<?=@$_GET['order_cost']?>'></td>
<td><select name='id_client'>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                if ($row['id_client'] == $_GET['sales'])
                    echo "<option selected value='" . $row['id_client'] . "'>" . $row['id_client'] . "</option>";
                else
                    echo "<option value='" . $row['id_client'] . "'>" . $row['id_client'] . "</option>";
            }
            ?>
        </select></td>
</tr>
</table>
<p><input type='SUBMIT' name='ENTER' value='SUBMIT CHANGES'></p>
</form>
</body>
</html>
