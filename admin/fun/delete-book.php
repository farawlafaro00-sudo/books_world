<?php
include("../inc/conn.php");

$id = $_GET['id'];

$del = " DELETE FROM books WHERE id = :id ";

$res_del = $pdo->prepare($del);

$res_del->execute([':id' => $id]);

header("Location:../books.php");

exit();
