<?
include 'connect.php';
session_start();
$id = $_POST['unit'];
if (empty($_POST['unit'])) {
    $_SESSION['error']['unit'] = 'Виберіть одиниці вимірювання склад';
    header('Location:../settings_unit.php');
}
$getCount = "SELECT COUNT(*) FROM `material` WHERE `material`.`UnitId` = " . $id;
$count = $pdo->query($getCount)->fetch();

if (!($count['COUNT(*)'] <= 0)) {
    $_SESSION['error']['unit'] = 'Дана одиниця вимірювання вже відносить до матералів';
    header('Location:../settings_unit.php');
} else {
    $sql = "DELETE FROM units WHERE `id` = " . $id;
    $delete = $pdo->query($sql);

    $_SESSION['error']['unit'] = 'Одиницю вимірювання видалений';
    header('Location:../settings_unit.php');
}
