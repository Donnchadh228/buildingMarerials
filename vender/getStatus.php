<?
include 'connect.php';

$sql = "SELECT * FROM `status`";
$getStatus = $pdo->query($sql);
