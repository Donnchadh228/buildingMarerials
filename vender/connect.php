<?
$dsn = 'mysql:host=localhost;dbname=building_materials';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Помилка при підключенні до БД: ' . $e->getMessage();
}
