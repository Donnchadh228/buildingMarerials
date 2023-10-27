<?
include 'connect.php';

$sql = "SELECT `warehouse_material`.*,`warehouse_material`.`id` as `idMat`, `material`.*, `warehouse`.`address` as `address`, `status`.`name` as `status`,`status`.`id` as `statusId`, `units`.`name` as `unit`, `brand`.`brand` as `brand`, `country`.`country` as `country`,`warehouse_material`.`id` as `wrhId`
FROM `warehouse_material` 
INNER JOIN `warehouse` ON `warehouse_material`.`warehouseId` = `warehouse`.`id`
INNER JOIN `status` ON `warehouse_material`.`statusId` = `status`.`id` 
INNER JOIN `material` ON `warehouse_material`.`materialId` = `material`.`id` 
INNER JOIN `units` ON `material`.`unitId` = `units`.`id`
INNER JOIN `brand` on `material`.`brandId` = `brand`.`id`
INNER JOIN `country` on `material`.`countryId` = `country`.`id`";
if (!empty($LimitMaterial)) {
    $sql .= "LIMIT " . $LimitMaterial;
} else {
    $sql .= "LIMIT 6";
}

$allMaterial = $pdo->query($sql);
