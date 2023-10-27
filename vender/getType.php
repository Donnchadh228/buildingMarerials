<?
include 'connect.php';

$sql = "SELECT * FROM `type`";
$getType = $pdo->query($sql);
