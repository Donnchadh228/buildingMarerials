<?
include 'connect.php';
session_start();


$getCount = "SELECT COUNT(*) FROM `warehouse_material` WHERE `warehouse_material`.`warehouseId` = " . $_POST['warehouse'];
if (empty($_POST['warehouse'])) {
    $_SESSION['error']['warehouse'] = 'Виберіть склад';
    header('Location:../settings_warehouse.php');
}
$count = $pdo->query($getCount)->fetch();

if (!($count['COUNT(*)'] <= 0)) {
    $_SESSION['error']['warehouse'] = 'На складі є матеріали';
    header('Location:../settings_warehouse.php');
} else {
    $sql = "DELETE FROM warehouse WHERE `warehouse`.`id` = " . $_POST['warehouse'];
    $delete = $pdo->query($sql);

    $_SESSION['error']['warehouse'] = 'Видалений склад';
    header('Location:../settings_warehouse.php');
}
