<?
include 'connect.php';

$sql = "SELECT * FROM `supplier`";
$getPostman = $pdo->query($sql);
