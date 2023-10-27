<?
include 'connect.php';
session_start();
$name = $_POST['unit'];

if (empty($name) == true) {
    $_SESSION['add']['unit'] = 'Одиниця вимірювання не може бути пустою';
    die(header('Location:../settings_unit.php'));
}

$sql = "INSERT INTO `units` (`id`, `name`) VALUES (NULL, '$name')";
$add = $pdo->query($sql);

$_SESSION['add']['unit'] = 'Одиницю вимірювання додано';
header('Location:../settings_unit.php');
