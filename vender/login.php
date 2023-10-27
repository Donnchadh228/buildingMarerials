<?
session_start();
include 'connect.php';

$sql = "SELECT * FROM `password` ";


$password = $pdo->query($sql)->fetch();

// $password = "123456789";
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
// echo $hashedPassword;

$userInputPassword = $_POST['password'];

$hashedPasswordFromDatabase = $password['password'];


if (password_verify($userInputPassword, $hashedPasswordFromDatabase)) {
    $_SESSION['login'] = true;
    header('Location: ../index.php');
} else {
    $_SESSION['error']['password'] = 'Невірний пароль';
    header('Location: ../login.php');
}
