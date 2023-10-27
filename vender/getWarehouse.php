<?
include 'connect.php';

$sql = "SELECT * FROM `warehouse`";
$getWarehouse = $pdo->query($sql);
