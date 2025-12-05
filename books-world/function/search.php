<?php
include("../include/connect.php");

if (isset($_GET['search'])) {

    $search = trim($_GET['search']);

    
    $det_books = "SELECT * FROM books WHERE name LIKE :search";
    $res_det = $pdo->prepare($det_books);
    $res_det->execute(['search' => "%$search%"]);

    
    $book_dets = $res_det->fetchAll(PDO::FETCH_ASSOC);

    if (count($book_dets) > 0) {

        foreach ($book_dets as $book_det) {

            header("Location:../book_details.php?id=" . $book_det['id']);

            exit();
        }
    } else {
       header("location:../error.php");
    }
}
