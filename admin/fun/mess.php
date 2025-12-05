<?php

include("../inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // استعلام الإدخال
    $ins_mess = "INSERT INTO message (name, email, mess) VALUES (:name, :email, :mess)";
    $res_mess = $pdo->prepare($ins_mess);

    // القيم المُدخلة من المستخدم
    $name  = $_POST['name'];
    $email  = $_POST['email'];
    $mess = $_POST['mess'];


    // ربط القيم بالاستعلام
    $res_mess->bindParam(':name', $name);
    $res_mess->bindParam(':email', $email);
    $res_mess->bindParam(':mess', $mess);


    // تنفيذ الاستعلام
    if ($res_mess->execute()) {

        header("location:../../books_world/index.php");

        exit();
    } else {
        echo '  Error in Add ⚠️  ';
    }
}
