<?
include 'connect.php';
session_start();
$name = $_POST['brand'];

if (empty($name) == true) {
    $_SESSION['add']['brand'] = 'Назва бренду не може бути пустою';
    die(header('Location:../settings_brand.php'));
}

$sql = "INSERT INTO `brand` (`id`, `brand`) VALUES (NULL, '$name')";
$add = $pdo->query($sql);

$_SESSION['add']['brand'] = 'Бренд додано';
header('Location:../settings_brand.php');
