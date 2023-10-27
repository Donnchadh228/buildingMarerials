<?
include 'connect.php';
session_start();

$postman = $_POST['postman'];
$desc = $_POST['description_material'];
$price = $_POST['price_material'];
$size = $_POST['size_material'];
$type = $_POST['type'];
$brand = $_POST['brand'];
$country = $_POST['country'];
$unit = $_POST['unit'];
$name = $_POST['name_material'];
$expiration_date = $_POST['expiration_date'];
$warehouse = $_POST['warehouse'];
$count = $_POST['count'];

$nameImg;
$_SESSION['postman'] = $postman;

$_SESSION['description_material'] = $desc;
$_SESSION['price_material'] = $price;
$_SESSION['size_material'] = $size;
$_SESSION['type'] = $type;
$_SESSION['brand'] = $brand;
$_SESSION['country'] = $country;
$_SESSION['unit'] = $unit;
$_SESSION['name_material'] = $name;
$_SESSION['expiration_date'] = $expiration_date;
$_SESSION['warehouse'] = $warehouse;
$_SESSION['count'] = $count;
if (empty($postman)) {

    $_SESSION['error'] = "Виберіть постачальника";
    die(header('Location:../add_material.php'));
}

if (empty($desc)) {
    $_SESSION['error'] = "Напишіть опис";
    die(header('Location:../add_material.php'));
}

if (empty($price)) {
    $_SESSION['error'] = "Напишіть ціну";
    die(header('Location:../add_material.php'));
}


if (empty($type)) {
    $_SESSION['error'] = "Виберіть тип";
    die(header('Location:../add_material.php'));
}

if (empty($brand)) {
    $_SESSION['error'] = "Виберіть бренд";
    die(header('Location:../add_material.php'));
}

if (empty($country)) {
    $_SESSION['error'] = "Виберіть країну";
    die(header('Location:../add_material.php'));
}

if (empty($unit)) {
    $_SESSION['error'] = "Виберіть одиниці вимірювання";
    die(header('Location:../add_material.php'));
}

if (empty($name)) {
    $_SESSION['error'] = "Напишіть назву";
    die(header('Location:../add_material.php'));
}



if (empty($warehouse)) {
    $_SESSION['error'] = "Виберіть адресу складу";
    die(header('Location:../add_material.php'));
}

if (empty($count)) {
    $_SESSION['error'] = "Введіть кількість купівлі матеріалу";
    die(header('Location:../add_material.php'));
}




if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $targetDir = "../img/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $nameImg = $_FILES["image"]["name"];

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
        //
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Зображення завантажилось.";
        } else {
            echo "Помилка при завантаження зображення.";
        }
    } else {
    }
} else {
    echo "Не вийшло завантажити файл.";

    $_SESSION['error'] = "виберіть зображення";
    die(header('Location:../add_material.php'));
}
!empty($size) ? " " : $size = 'Немає';

!empty($expiration_date) ? "" : $expiration_date = 'Немає';

$sql = "INSERT INTO
 `material` (`id`, `name`, `description`, `img`, `unitId`, `price_per_unit`, `expiration_date`, `countryId`, `brandId`, `size`, `supplierId`, `typeId`, `countPostman`, `statusPostman`, `datePostman`, `warehousePostman`) 
 VALUES 
(NULL, '$name', '$desc', '$nameImg', $unit, $price, '$expiration_date', $country, $brand, '$size', $postman, $type, $count, '2', CURRENT_TIMESTAMP, $warehouse)
";

$add = $pdo->query($sql);
// echo $sql;
unset($_SESSION['postman']);
unset($_SESSION['description_material']);
unset($_SESSION['price_material']);
unset($_SESSION['size_material']);
unset($_SESSION['type']);
unset($_SESSION['brand']);
unset($_SESSION['country']);
unset($_SESSION['unit']);
unset($_SESSION['name_material']);
unset($_SESSION['expiration_date']);
unset($_SESSION['warehouse']);
unset($_SESSION['count']);
unset($_SESSION['error']);

header('Location:../agreement.php');
