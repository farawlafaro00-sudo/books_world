<?php

include("include/connect.php");
include("include/header.php");


if (!isset($_GET['id'])) {
    die("Book not found!");
}

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);


?>


<body>
    <?php
    include("include/nav.php");

    ?>


    <div class="details-container">


        <div class="img-box">
            <img src="../admin/img/<?= $book['image']; ?>" alt="<?= $book['name']; ?>">
        </div>


        <div class="info-box">
            <h1><?= $book['name']; ?></h1>


            <p class="info"><strong>المؤلف : </strong> <?= $book['auther']; ?></p>
            <p class="info"><strong>النوع : </strong><?= $book['type']; ?></p>
            <p class="info"><strong>السعر : </strong> <?= $book['price']; ?> ج.م</p>

            <div class="desc">
                <?= $book['desc']; ?>
            </div>

            <?php if (isset($_SESSION['login'])): ?>
                
                <a href="function/add-to-cart.php?action=add&id=<?= $book['id']; ?>" class="btn-back">شراء</a>
            <?php else: ?>
                
                <a href="login.php?redirect=book_details.php?id=<?= $book['id']; ?>" class="btn-back">شراء</a>
            <?php endif; ?>

            <a href="../admin/pdf/<?= $book['pdf_file'] ?>" class="btn-back" target="_blank">تحميل</a>

        </div>

    </div>




    <?php


    include("include/footer.php");

    ?>


</body>

</html>