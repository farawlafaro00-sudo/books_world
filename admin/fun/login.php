<?php

session_start();
// عند login success
$_SESSION["admin_session"] = $name;

include("../inc/conn.php");
// لو المستخدم بالفعل عامل تسجيل دخول، رجعه للصفحة الرئيسية
if (isset($_SESSION['admin_session'])) {
    header("location:../panel.php");
    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name)) {
        $errors["name"] = "name is required";
    }
    if (empty($email)) {
        $errors["email"] = "email is required";
    }
    if (empty($password)) {
        $errors["password"] = "Password is required";
    }

    if (empty($errors)) {
        // تجهيز الاستعلام باستخدام PDO
        $select = "SELECT * FROM users WHERE name = :name AND email = :email AND  password = :password";
        $stmt = $pdo->prepare($select);

        // ربط القيم مع الاستعلام
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // تنفيذ الاستعلام
        $stmt->execute();

        // التحقق من النتيجة
        if ($stmt->rowCount() == 1) {
            $_SESSION["admin_session"] = $name;
            header("location:../panel.php");
            exit();
        } else {
            $errors["login"] = "Incorrect Data❌";
        }
    }


    $_SESSION['user_error'] = $errors;
    header("location:../index.php");
    exit();
}
