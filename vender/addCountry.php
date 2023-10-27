<?
include 'connect.php';
session_start();
$name = $_POST['country'];

if (empty($name) == true) {
    $_SESSION['add']['country'] = 'Назва країни не може бути пустою';
    die(header('Location:../settings_country.php'));
}

$sql = "INSERT INTO `country` (`id`, `country`) VALUES (NULL, '$name')";
$add = $pdo->query($sql);

$_SESSION['add']['country'] = 'Тип додано';
header('Location:../settings_country.php');
