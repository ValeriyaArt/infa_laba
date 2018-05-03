   <?php
   require_once 'connection.php'; // подключаем скрипт
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

    $name = $_GET['grape_sort'];
    $fio = $_GET['company_name'];

    echo "<form method='GET' action='search.php'>
    <p>Введите часть от названия сорта винограда(на английском): <input type='text' name='grape_sort' value='$grape_sort'></p>
    <p>Введите часть от названия компании: <input type='text' name='company_name' value='$company_name'></p>
    <p><input type='submit' name='enter' value='Search'></p>
    </form>";

    if (isset($_GET['enter']))
    {
      $sql="SELECT client.company_name, supply_of_raw_materials.grape_sort
    FROM client, supply_of_raw_materials, technology,production, sales
    WHERE sales.id_client=client.id_client
    AND
    sales.id_product=production.id_product
    AND
    production.id_technology=technology.id_technology
    AND
    supply_of_raw_materials.id_raw_material=technology.id_raw_material
    AND grape_sort LIKE '%$grape_sort%' AND company_name LIKE '%$company_name%'";



$result = mysqli_query($link, $sql);
echo "<table border='1'>
<tr> 
<th>grape_sort</th>
<th>company_name</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['grape_sort'] . "</td>";
echo "<td>" . $row['company_name'] . "</td>";
echo "</tr>";
}

echo "</table>"; 

}


mysqli_close($link);
?>

