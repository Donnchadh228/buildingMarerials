<?
include 'connect.php';

$sql = "SELECT * FROM `brand`";
$getBrand = $pdo->query($sql);
