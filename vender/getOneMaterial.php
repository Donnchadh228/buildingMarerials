<?
include 'connect.php';

$sql = "SELECT `warehouse_material`.*,`warehouse_material`.`id` as `idMat`, `material`.*, `warehouse`.`address` as `address`, `status`.`name` as `status`,`status`.`id` as `statusId`, `units`.`name` as `unit`, `brand`.`brand` as `brand`, `country`.`country` as `country`, `supplier`.`name_company` as `name_postman`, `type`.`name` as `type`
FROM `warehouse_material` 
INNER JOIN `warehouse` ON `warehouse_material`.`warehouseId` = `warehouse`.`id`
INNER JOIN `status` ON `warehouse_material`.`statusId` = `status`.`id` 
INNER JOIN `material` ON `warehouse_material`.`materialId` = `material`.`id` 
INNER JOIN `units` ON `material`.`unitId` = `units`.`id`
INNER JOIN `brand` on `material`.`brandId` = `brand`.`id`
INNER JOIN `supplier` on `material`.`supplierId` = `supplier`.`id`
INNER JOIN `country` on `material`.`countryId` = `country`.`id`  
INNER JOIN `type` on `material`.`typeId` = `type`.`id`";
if (!empty($id)) {
    $sql .=  "WHERE `warehouse_material`.`id` = " . $id;
} else {
    $sql .= "LIMIT 1";
}

$material = $pdo->query($sql)->fetch();
// SELECT `warehouse_material`.*, `material`.*, `warehouse`.`address` as `address`, `status`.`name` as `status`, `units`.`name` as `unit`, `brand`.`brand` as `brand`, `country`.`country` as `country`
// FROM `warehouse_material` 
// INNER JOIN `warehouse` ON `warehouse_material`.`warehouseId` = `warehouse`.`id`
// INNER JOIN `status` ON `warehouse_material`.`statusId` = `status`.`id` 
// INNER JOIN `material` ON `warehouse_material`.`materialId` = `material`.`id` 
// INNER JOIN `units` ON `material`.`unitId` = `units`.`id`
// INNER JOIN `brand` on `material`.`brandId` = `brand`.`id`
// INNER JOIN `country` on `material`.`countryId` = `country`.`id`;
