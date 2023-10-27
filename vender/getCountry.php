<?
include 'connect.php';

$sql = "SELECT * FROM `country`";
$getCountry = $pdo->query($sql);
