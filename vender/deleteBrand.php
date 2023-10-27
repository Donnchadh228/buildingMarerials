<?
include 'connect.php';
session_start();
$id = $_POST['brand'];
if (empty($_POST['brand'])) {
    $_SESSION['error']['brand'] = 'Виберіть бренд';
    header('Location:../settings_brand.php');
}
$getCount = "SELECT COUNT(*) FROM `material` WHERE `material`.`brandId` = " . $id;
$count = $pdo->query($getCount)->fetch();

if (!($count['COUNT(*)'] <= 0)) {
    $_SESSION['error']['brand'] = 'Даний бренд вже відносить до матералів';
    header('Location:../settings_brand.php');
} else {
    $sql = "DELETE FROM brand WHERE `id` = " . $_POST['brand'];
    $delete = $pdo->query($sql);

    $_SESSION['error']['brand'] = 'Бренд видалений';
    header('Location:../settings_brand.php');
}
