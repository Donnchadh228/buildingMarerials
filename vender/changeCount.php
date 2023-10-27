<?
include 'connect.php';
session_start();
$count = $_POST['count1'];
$id = $_POST['idM'];
echo $count;
if (empty($count) == true) {
    $_SESSION['change']['count'] = 'Введіть кількість матеріалу';
    die(header('Location:../material.php?id=' . $id));
}

$sql = "UPDATE `warehouse_material` SET `count` = $count WHERE `warehouse_material`.`id` =$id";
$add = $pdo->query($sql);


header('Location:../material.php?id=' . $id);
