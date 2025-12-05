<?php



// CONNECT TO DATABASE

$host = "localhost";
$dbname = "books";
$username = "root";
$password = "";

try {

    $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "connected is not completed❌" . $e->getMessage();
}

?>