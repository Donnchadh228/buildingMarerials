<?
include 'connect.php';
$LIMITBlock = 3;
$sql = "SELECT `material`.*, `units`.`name` as `unit`,`country`.`country` as `country`, `supplier`.`name_company` as `name_postman`, `brand`.`brand` as `brand`, `type`.`name` as `type`,`status`.`name` as `status`,`warehouse_material`.*,`material`.`id` as `materialId`,`warehouse`.`address` as `address`,`warehouse_material`.`id` as `wrhId`, `warehouse_material`.`count` as `countWM`
FROM `material`
 INNER JOIN `units` ON `material`.`unitId` = `units`.`id`
 INNER JOIN `brand` on `material`.`brandId` = `brand`.`id`
 INNER JOIN `type` on `material`.`typeId` = `type`.`id`
 INNER JOIN `supplier` on `material`.`supplierId` = `supplier`.`id`
 INNER JOIN `country` on `material`.`countryId` = `country`.`id`
 INNER JOIN `status` on `material`.`statusPostman` = `status`.`id`
  INNER JOIN `warehouse` on `material`.`warehousePostman` = `warehouse`.`id`
 LEFT  JOIN `warehouse_material` on `warehouse_material`.`materialId` = `material`.`id`

 WHERE 1";

// $sql = "SELECT `warehouse_material`.*,`warehouse_material`.`id` as `idMat`, `material`.*, `warehouse`.`address` as `address`, `status`.`name` as `status`,`status`.`id` as `statusId`, `units`.`name` as `unit`, `brand`.`brand` as `brand`, `country`.`country` as `country`, `supplier`.`name_company` as `name_postman`
// FROM `warehouse_material` 
// INNER JOIN `warehouse` ON `warehouse_material`.`warehouseId` = `warehouse`.`id`
// INNER JOIN `status` ON `warehouse_material`.`statusId` = `status`.`id` 
// INNER JOIN `material` ON `warehouse_material`.`materialId` = `material`.`id` 
// INNER JOIN `units` ON `material`.`unitId` = `units`.`id`
// INNER JOIN `brand` on `material`.`brandId` = `brand`.`id`
// INNER JOIN `supplier` on `material`.`supplierId` = `supplier`.`id`
// INNER JOIN `country` on `material`.`countryId` = `country`.`id` WHERE 1 ";


if ($_GET['priceTo']) {
    $sql .= ' AND `material`.`price_per_unit` <= ' . $_GET['priceTo'];
}
if ($_GET['priceFrom']) {
    $sql .= ' AND `material`.`price_per_unit` >= ' . $_GET['priceFrom'];
}

if ($_GET['dateTo']) {
    $sql .= ' AND `material`.`datePostman` <= '  . '\'' . $_GET['dateTo']  . '\'';
}
if ($_GET['dateFrom']) {
    $sql .= ' AND `material`.`datePostman` >= ' . '\'' . $_GET["dateFrom"] . '\'';
}
if ($_GET['postman']) {
    $sql .= ' AND `material`.`supplierId` = ' . $_GET["postman"];
}
if ($_GET['unit']) {
    $sql .= ' AND `material`.`unitId` = ' . $_GET['unit'];
}
if ($_GET['type']) {
    $sql .= ' AND `material`.`typeId` = ' . $_GET['type'];
}
if ($_GET['available']) {
    $sql .= ' AND `warehouse_material`.`statusId` = ' . $_GET['available'];
}
if ($_GET['status']) {
    $sql .= ' AND `material`.`statusPostman` = ' . $_GET['status'];
}

if (!empty($sort)) {
    if ($sort == 'news') {
        $sql .= ' ORDER BY `warehouse_material`.`appearance_date` ';
    }
    if ($sort == 'cheap') {
        $sql .= ' ORDER BY `warehouse_material`.`price_per_units` ';
    }
    if ($sort == 'expensive') {
        $sql .= ' ORDER BY `warehouse_material`.`price_per_units` DESC ';
    }
} else {
    $sql .= ' ORDER BY `material`.`id` DESC ';
}
$sqls = $sql;
if (!empty($LIMITBlock)) {
    $sql .= " LIMIT " . $LIMITBlock;
} else {
    $sql .= " LIMIT 5";
}
$page = $_GET['page'];
if (empty($page) or $page == 1) {
    $sql .= " OFFSET 0";
} else {

    $sql .= " OFFSET " . $LIMITBlock * ($page - 1);
}

// echo $sql;

$mm = $pdo->query($sqls);
$countff = $mm->rowCount();
$allMaterial = $pdo->query($sql);
$pageCount = $countff / $LIMITBlock;
