<?
include 'connect.php';
session_start();
$id = $_POST['type'];
if (empty($_POST['type'])) {
    $_SESSION['error']['type'] = 'Виберіть тип';
    header('Location:../settings_type.php');
}
$getCount = "SELECT COUNT(*) FROM `material` WHERE `material`.`typeId` = " . $id;
$count = $pdo->query($getCount)->fetch();

if (!($count['COUNT(*)'] <= 0)) {
    $_SESSION['error']['type'] = 'Даний тип вже відносить до матералів';
    header('Location:../settings_type.php');
} else {
    $sql = "DELETE FROM `type` WHERE `id` = " . $id;
    $delete = $pdo->query($sql);

    $_SESSION['error']['type'] = 'Тип видалений';
    header('Location:../settings_type.php');
}
