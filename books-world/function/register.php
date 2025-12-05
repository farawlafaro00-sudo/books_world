<?php

include("../include/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // استعلام الإدخال
    $ins_buyer = "INSERT INTO buyer (name, email, password, address) VALUES (:username, :email, :password, :address)";
    $res_buyer = $pdo->prepare($ins_buyer);

    // القيم المُدخلة من المستخدم
    $username  = $_POST['username'];
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    // ربط القيم بالاستعلام
    $res_buyer->bindParam(':username', $username);
    $res_buyer->bindParam(':email', $email);
    $res_buyer->bindParam(':password', $password);
    $res_buyer->bindParam(':address', $address);


    // تنفيذ الاستعلام
    if ($res_buyer->execute()) {

        
        $event = "INSERT INTO timeline_events (user_name, event_type, title, description, icon, color)VALUES (?, 'register', 'تسجيل مشتري جديد', ?, 'glyphicon-user', '#915831')";
        $res_ev =  $pdo->prepare($event);
        $res_ev->execute([$username, "تم تسجيل المشتري $username بنجاح في الموقع."]);

        header("location:../login.php");

        exit();
    } else {
        echo '  Error in Add ⚠️  ';
    }
}
