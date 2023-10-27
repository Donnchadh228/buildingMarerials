<?
include 'connect.php';
session_start();
$pp = $_POST['address'];
if (empty($pp) == true) {

    $_SESSION['add']['warehouse'] = 'Адреса не може бути пустою';
    die(header('Location:../settings_warehouse.php'));
}
$sql = "INSERT INTO `warehouse` (`id`, `address`) VALUES (NULL, '$pp')";
$add = $pdo->query($sql);

$_SESSION['add']['warehouse'] = 'Склад додано';
header('Location:../settings_warehouse.php');
