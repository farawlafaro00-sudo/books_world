<?php

include("../inc/conn.php");

$id = $_GET['id'];
$name = $_POST['name'];
$auther = $_POST['auther'];
$descr = $_POST['descr'];
$type = $_POST['type'];
$price = $_POST['price'];


$imgName = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $uploadImg = '../img/';
    $imgName = basename($_FILES['image']['name']);
    $targPath = $uploadImg . $imgName;
    move_uploaded_file($_FILES['image']['tmp_name'], $targPath);
} else {
    // في حالة عدم رفع صورة جديدة، نستخدم الصورة القديمة من قاعدة البيانات
    $sel_img = $pdo->prepare("SELECT image FROM books WHERE id = ?");
    $sel_img->execute([$id]);
    $books = $sel_img->fetch(PDO::FETCH_ASSOC);
    $imgName = $books['image'];
}


$pdfName = '';

if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {

    $uploadPdf = '../pdf/';
    $pdfName = basename($_FILES['pdf']['name']);
    $targetPath = $uploadPdf . $pdfName;
    move_uploaded_file($_FILES['pdf']['tmp_name'], $targetPath);
} else {
    // في حالة عدم رفع pdf جديد، نستخدم pdf القديم من قاعدة البيانات
    $sel_pdf = $pdo->prepare("SELECT pdf_file FROM books WHERE id = ?");
    $sel_pdf->execute([$id]);
    $books_pdf = $sel_pdf->fetch(PDO::FETCH_ASSOC);
    $pdfName = $books_pdf['pdf_file'];
}








$update_books = $pdo->prepare("UPDATE books SET `name` = ?, `image` = ?,`pdf_file` = ? ,`auther` = ? , `desc` = ? , `type` = ? , `price` = ? WHERE id = ?");
$succ_books = $update_books->execute([$name, $imgName, $pdfName, $auther, $descr, $type, $price, $id]);

if ($succ_books) {

    header("Location:../books.php");
    exit();
} else {
    header("Location:../books.php");
    echo "error in update❌";
}
