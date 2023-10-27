<?
include 'connect.php';
session_start();


$getCount = "SELECT COUNT(*) FROM `material` WHERE `material`.`supplierId` = " . $_POST['postman'];

if (empty($_POST['postman'])) {
    $_SESSION['error']['postman'] = 'Виберіть постачальника';
    header('Location:../settings_postman.php');
}
$count = $pdo->query($getCount)->fetch();

if (!($count['COUNT(*)'] <= 0)) {
    $_SESSION['error']['postman'] = 'У постачальника є матеріали';
    header('Location:../settings_postman.php');
} else {
    $sql = "DELETE FROM supplier WHERE `supplier`.`id` = " . $_POST['postman'];
    $delete = $pdo->query($sql);

    $_SESSION['error']['postman'] = 'Постачальник видалений';
    header('Location:../settings_postman.php');
}
