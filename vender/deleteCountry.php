<?
include 'connect.php';
session_start();
$id = $_POST['country'];
if (empty($_POST['country'])) {
    $_SESSION['error']['country'] = 'Виберіть країну';
    header('Location:../settings_country.php');
}
$getCount = "SELECT COUNT(*) FROM `material` WHERE `material`.`countryId` = " . $id;
$count = $pdo->query($getCount)->fetch();

if (!($count['COUNT(*)'] <= 0)) {
    $_SESSION['error']['country'] = 'Дана країна вже відносить до матералів';
    header('Location:../settings_country.php');
} else {
    $sql = "DELETE FROM country WHERE `id` = " . $id;
    $delete = $pdo->query($sql);

    $_SESSION['error']['country'] = 'Країна видалений';
    header('Location:../settings_country.php');
}
