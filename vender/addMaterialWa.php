<?php
include 'connect.php';
var_dump($_POST);
echo "<br/>";
$price = $_POST['prices'];
$id = $_POST['id'];
$sql = "UPDATE `material` SET  `statusPostman` = 1 WHERE `material`.`id` = " . $id;
$change = $pdo->query($sql);

$sql1 = "SELECT * FROM `material` WHERE `id` = " . $id;
$material = $pdo->query($sql1)->fetch();
$count = $material['countPostman'];
$ware = $material['warehousePostman'];
// var_dump($material);
$add = "INSERT INTO `warehouse_material` (`id`, `materialId`, `statusId`, `count`, `price_per_units`, `warehouseId`, `appearance_date`) VALUES (NULL,  $id, 1 , $count, $price,$ware, CURRENT_TIMESTAMP)";
// echo $add;
$change = $pdo->query($add);
header('Location: ../agreement.php');
