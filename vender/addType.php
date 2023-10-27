<?
include 'connect.php';
session_start();
$name = $_POST['type'];

if (empty($name) == true) {
    $_SESSION['add']['type'] = 'Назва типу не може бути пустою';
    die(header('Location:../settings_type.php'));
}

$sql = "INSERT INTO `type` (`id`, `name`) VALUES (NULL, '$name')";
$add = $pdo->query($sql);

$_SESSION['add']['type'] = 'Тип додано';
header('Location:../settings_type.php');
