<?php
session_start();
include("../include/connect.php");

if (!isset($_SESSION['login'])) {
    header("Location:../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("No book selected");
}

$book_id = $_GET['id'];
$user = $_SESSION['login'];


$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$book_id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    die("Book not found!");
}


$name = $book['name'];
$image = $book['image'];
$price = $book['price'];
$quantity = 1;
$total = $price * $quantity;

// إدخال الطلب في جدول orders
$insert = "INSERT INTO orders(name, image, price, quantity, total, book_id, buyer_name)VALUES(?,?,?,?,?,?,?)";
$stmt2 = $pdo->prepare($insert);
$stmt2->execute([$name, $image, $price, $quantity, $total, $book_id, $user]);


$event = $pdo->prepare("
        INSERT INTO timeline_events (user_name, event_type, title, description, icon, color)
        VALUES (?, 'purchase', 'عملية شراء جديدة', ?, 'glyphicon-shopping-cart', '#915831')
    ");
$event->execute([$user, "قام المشتري $user بشراء  $name '$product'."]);

echo "تم تسجيل عملية الشراء بنجاح!";

header("Location:../cart.php");
exit();
