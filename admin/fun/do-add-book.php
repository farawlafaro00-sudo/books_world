<?php

include("../inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // التحقق من رفع الصورة
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo " Please you must choose image to add new-info ⚠️";
        exit();
    }

    // رفع الصورة
    $uploadImg = '../img/';
    $imgName = basename($_FILES['image']['name']);
    $targFile = $uploadImg . $imgName;


    // نقل الصورة للمجلد
    move_uploaded_file($_FILES['image']['tmp_name'], $targFile);


    // التحقق من رفع pdf
    if (!isset($_FILES['pdf']) || $_FILES['pdf']['error'] !== UPLOAD_ERR_OK) {
        echo " Please you must choose PDF to add new-info ⚠️";
        exit();
    }

    // رفع pdf
    $uploadPdf = '../pdf/';
    $PdfName = basename($_FILES['pdf']['name']);
    $targetFiles = $uploadPdf . $PdfName;


    // نقل pdf للمجلد
    move_uploaded_file($_FILES['pdf']['tmp_name'], $targetFiles);

    // استعلام الإدخال
    $add_book = "INSERT INTO books (`name`, `image`, `pdf_file`, `auther`, `desc`, `type`, `price`) 
VALUES (:name, :image, :pdf , :auther , :descr , :type , :price)";

    $res_add = $pdo->prepare($add_book);

    // القيم المُدخلة من المستخدم
    $name  = $_POST['name'];
    $auther = $_POST['auther'];
    $descr = $_POST['descr'];
    $type = $_POST['type'];
    $price = $_POST['price'];


    // ربط القيم بالاستعلام
    $res_add->bindParam(':name', $name);
    $res_add->bindParam(':image', $imgName);
    $res_add->bindParam(':pdf', $PdfName);
    $res_add->bindParam(':auther', $auther);
    $res_add->bindParam(':descr', $descr);
    $res_add->bindParam(':type', $type);
    $res_add->bindParam(':price', $price);

    // تنفيذ الاستعلام
    if ($res_add->execute()) {
        header("location:../books.php");
        exit();
    } else {
        echo '  Error in Add ⚠️  ';
    }
}
