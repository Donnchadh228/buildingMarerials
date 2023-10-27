<?
include 'connect.php';

$sql = "SELECT * FROM `units`";
$getUnits = $pdo->query($sql);
