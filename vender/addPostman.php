<?
include 'connect.php';
session_start();
$address = $_POST['address_postman'];
$name = $_POST['name_company'];
$number = $_POST['phone_postman'];
$email = $_POST['email'];
if (empty($name) == true) {
    $_SESSION['add']['postman'] = 'Назва компанії не може бути пустою';
    die(header('Location:../settings_postman.php'));
}
if (empty($address) == true) {
    $_SESSION['add']['postman'] = 'Адреса не може бути пустою';
    die(header('Location:../settings_postman.php'));
}
if (empty($number) == true) {

    $_SESSION['add']['postman'] = 'Номер не може бути пустим';
    die(header('Location:../settings_postman.php'));
}
$sql = "INSERT INTO `supplier` (`id`, `name_company`, `address`, `phone`, `email`) VALUES (NULL, '$name', '$address', '$number', '$email')";
$add = $pdo->query($sql);

$_SESSION['add']['warehouse'] = 'Постачальника додано';
header('Location:../settings_postman.php');
