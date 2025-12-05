<?php

include("../inc/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // استعلام الإدخال
    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($query);

    // القيم المُدخلة من المستخدم
    $name  = $_POST['name'];
    $email  = $_POST['email'];
    $password = $_POST['password'];


    // ربط القيم بالاستعلام
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);


    // تنفيذ الاستعلام
    if ($stmt->execute()) {

    //  إضافة حدث التسجيل في جدول timeline
        $event ="INSERT INTO timeline_events (user_name, event_type, title, description, icon, color)VALUES (?, 'register', 'تسجيل مستخدم جديد', ?, 'glyphicon-user', '#915831')";
        $res_ev =  $pdo->prepare($event);
        $res_ev->execute([$name, "تم تسجيل المستخدم $name بنجاح في الموقع."]);

        header("location:../index.php");

        exit();
    } else {
        echo '  Error in Add ⚠️  ';
    }
}
