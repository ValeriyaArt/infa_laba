<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Обнаружена ошибка в подключении к базе данных. Будь умницей, исправь, пока не поздно" . mysqli_error());
$id_order = $_GET['id_order'];
$sql = "SET foreign_key_checks = 0";
$result = mysqli_query($link, $sql);
$query = "DELETE FROM sales
    WHERE id_order ='$id_order'";
$result = mysqli_query($link, $query);
?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>
