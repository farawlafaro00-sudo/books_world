<?php
session_start();

// حذف سيشن المستخدم فقط
unset($_SESSION["user"]);

header("Location:../index.php");
exit();
?>



