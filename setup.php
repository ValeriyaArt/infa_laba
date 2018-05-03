<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";

$sql = "CREATE TABLE auxiliary_materials (
  id_material int(11) NOT NULL,
  material_type text,
  material_producer text,
  cost_of_material int(11) DEFAULT NULL,
  amount_of_materials int(11) DEFAULT NULL,
  term_of_the_contact date DEFAULT NULL,
  PRIMARY KEY (id_material))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO auxiliary_materials VALUES ('8801','bottle','SuperB','30','10000','2018-08-23'),('8802','bottle2','SuperB','45','10000','2018-08-23'),('8803','bottle3','SuperB','55','10000','2018-08-23'),('8804','box','SuperB','25','100000','2018-10-23'),('8805','box','SuperB','15','100000','2018-10-23'),('8806','bottle_cork','Ha-ha','15','400000','2018-10-23'),('8807','label','Creative','5','400000','2020-10-23')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE client (
  id_client int(11) NOT NULL,
  company_type text,
  company_name text,
  PRIMARY KEY (id_client))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO client VALUES ('4501','shop','Pyaterochka'),('4502','shop','Lenta'),('4503','shop','Ashan'),('4504','restaraunt','Marco_Polo'),('4505','bar','Happy_man')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE supply_of_raw_materials (
  id_raw_material int(11) NOT NULL,
  grape_sort text,
  date_of_delivery date DEFAULT NULL,
  scope_of_supply int(11) DEFAULT NULL,
  cost_of_delivery int(11) DEFAULT NULL,
  PRIMARY KEY (id_raw_material))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO `supply_of_raw_materials` VALUES ('1010','Aleksandrouli','2018-03-16','1000','2000'),('1012','Risling','2018-03-19','1500','2300'),('1013','Dolchetto','2018-03-23','2100','800'),('1014','Bovale','2018-03-09','300','3200')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE technology (
  id_technology int(11) NOT NULL,
  id_raw_material int(11) DEFAULT NULL,
  product_type text,
  period_of_preparation int(11) DEFAULT NULL,
  GOST text,
  fortress int(11) DEFAULT NULL,
  PRIMARY KEY (id_technology),
  KEY id_raw_material (id_raw_material),
  CONSTRAINT technology_ibfk_1 FOREIGN KEY (id_raw_material) REFERENCES supply_of_raw_materials (id_raw_material))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO `technology` VALUES ('2200','1010','vine','3','32030-2013','13'),('2210','1013','cognac','2','31732-2014','38'),('2220','1012','vine','4','32030-2013','16'),('2230','1013','vine','3','32032-2013','11'),('2240','1014','champagne','6','32031-2015','15'),('2250','1013','cognac','7','31732-2014','42');
";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE structural_subdivision (
  id_structural_subdivision int(11) NOT NULL,
  division_type text,
  head_of_division text,
  PRIMARY KEY (id_structural_subdivision))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO structural_subdivision VALUES ('1','office','Artamonov'),('2','manufactory','Popov'),('3','manufactory','Shmygin'),('4','manufactory','Shpak'),('5','laboratory','Panushkina'),('6','laboratory','Grigorieva'),('7','brothel','Toropov'),('8','stock','Badalov')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE employees (
  id_employee int(11) NOT NULL,
  id_structural_subdivision int(11) DEFAULT NULL,
  FIO text,
  position text,
  salary int(11) DEFAULT NULL,
  work_experience int(11) DEFAULT NULL,
  PRIMARY KEY (id_employee),
  KEY id_structural_subdivision (id_structural_subdivision),
  CONSTRAINT employees_ibfk_1 FOREIGN KEY (id_structural_subdivision) REFERENCES structural_subdivision (id_structural_subdivision))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO employees VALUES ('101001','1','Artamonov','superintendent','150000','5'),('101002','1','Larina','accountant','60000','12'),('202001','2','Popov','technologist','88000','3'),('202002','2','Aleksin','apparatus','50000','20'),('303001','3','Shmygin','technologist','90000','25'),('303002','3','Ananeva','apparatus','55000','14'),('404001','4','Shpak','technologist','85000','2'),('404002','4','Haritonov','apparatus','52000','5'),('505001','5','Panushkina','head_of_laboratory','87000','16'),('505002','5','Luybashevskaya','laboratory_assistant','62000','8'),('606001','6','Grigorieva','head_of_laboratory','90000','30'),('606002','6','Sisoeva','laboratory_assistant','60000','8'),('707001','7','Toropov','technologist','87000','10'),('707002','7','Ovchinnikov','apparatus','56000','7'),('808001','8','Badalov','head_of_stock','56000','7')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE equipment (
  id_equipment int(11) NOT NULL,
  id_structural_subdivision int(11) DEFAULT NULL,
  date_of_last_calibration date DEFAULT NULL,
  manufacture text,
  equipment_type text,
  PRIMARY KEY (id_equipment),
  KEY id_structural_subdivision (id_structural_subdivision),
  CONSTRAINT equipment_ibfk_1 FOREIGN KEY (id_structural_subdivision) REFERENCES structural_subdivision (id_structural_subdivision))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO equipment VALUES ('6600','2','2017-07-19','Alpha_Laval','corking_machine'),('6601','1','2017-09-10','Xerox','printer'),('6602','3','2017-05-30','Alpha_Laval','storage_tank'),('6603','5','2017-11-24','Alpha_Laval','storage_tank'),('6604','4','2017-07-24','Alpha_Laval','chromatograph'),('6605','5','2017-04-21','Cathrepiller','conveyor')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE production (
  id_product int(11) NOT NULL,
  id_technology int(11) DEFAULT NULL,
  id_structural_subdivision int(11) DEFAULT NULL,
  id_material int(11) DEFAULT NULL,
  cost_price int(11) DEFAULT NULL,
  volume_of_final_product int(11) DEFAULT NULL,
  PRIMARY KEY (id_product),
  KEY id_structural_subdivision (id_structural_subdivision),
  KEY id_technology (id_technology),
  KEY id_material (id_material),
  CONSTRAINT production_ibfk_1 FOREIGN KEY (id_structural_subdivision) REFERENCES structural_subdivision (id_structural_subdivision),
  CONSTRAINT production_ibfk_2 FOREIGN KEY (id_technology) REFERENCES technology (id_technology),
  CONSTRAINT production_ibfk_3 FOREIGN KEY (id_material) REFERENCES auxiliary_materials (id_material))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO `production` VALUES ('9002','2210','3','8801','490','200'),('9003','2220','3','8804','570','300'),('9004','2230','4','8801','1015','400'),('9005','2240','2','8803','890','250'),('9006','2250','5','8805','930','700');";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE sales (
  id_order int(11) NOT NULL,
  id_product int(11) DEFAULT NULL,
  id_client int(11) DEFAULT NULL,
  order_quantity int(11) DEFAULT NULL,
  departure_date date DEFAULT NULL,
  order_cost int(11) DEFAULT NULL,
  PRIMARY KEY (id_order),
  KEY id_product (id_product),
  KEY id_client (id_client),
  CONSTRAINT sales_ibfk_1 FOREIGN KEY (id_product) REFERENCES production (id_product),
  CONSTRAINT sales_ibfk_2 FOREIGN KEY (id_client) REFERENCES client (id_client))";
if (mysqli_query($link, $sql)) {
  echo "Молодец. Все получилось";
} else {
  echo "Ты дебил. Делай заново: " . mysqli_error($link);
}

$sql = "INSERT INTO `sales` VALUES ('330001','9002','4502','150','2018-03-22','600'),('330002','9003','4501','300','2018-03-28','850'),('330003','9004','4503','420','2018-03-19','1300'),('330004','9005','4504','500','2018-04-29','1000'),('330005','9006','4505','230','2018-04-29','1150')";
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Ничего не вышло <br>" . mysqli_error($link);
}


mysqli_close($link);
?>