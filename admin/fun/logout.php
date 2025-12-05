<?php
session_start();

// حذف سيشن المستخدم فقط
unset($_SESSION["admin_session"]);

header("Location:../index.php");
exit();
