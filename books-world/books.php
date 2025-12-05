<?php
session_start();
include("include/connect.php");
include("include/header.php");

// Pagination variables
$items_per_page = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Get total number of books
$total_books_query = "SELECT COUNT(*) as total FROM books";
$total_books_result = $pdo->query($total_books_query);
$total_books = $total_books_result->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = ceil($total_books / $items_per_page);

// Select books with pagination
$select_books = "SELECT * FROM books LIMIT $items_per_page OFFSET $offset";
$result_books = $pdo->query($select_books);

?>


<body>

    <nav class="navbar   border-bottom border-body">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/farawla.elkhatib?mibextid=ZbWKwL" target="_blank"><i class="fa-brands fa-facebook" aria-hidden="true" style="color: #934801;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com/farawla_el5atib?igsh=MWttMDJzcHM3MHUwcg==" target="_blank"><i class="fa-brands fa-instagram" aria-hidden="true" style="color: #934801;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.linkedin.com/in/asmaa-elkhatib-971424324?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="fa-brands fa-linkedin" aria-hidden="true" style="color: #934801;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="https://t.me/farawlaelkhatib" target="_blank"><i class="fa-brands fa-telegram" aria-hidden="true" style="color: #934801;"></i></a>
            </li>

            <li class="nav-item">
                <h1 class="logo  gradient-text"> BOOKS_WORLD </h1>
            </li>
            <li class="nav-item">
                <form action="function/search.php" method="get">
                    <input type="search" placeholder="Search" class="search" name="search">
                    <button class="btn btn  bt-search" type="submit">GO</button>
                </form>
            </li>
        </ul>
    </nav>


    <nav class="navbar  nav-2">
        <ul class="nav main">
            <li class="nav-item">
                <a class="nav-link li2" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link li2" href="books.php">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link li2" href="about_us.php">About-Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link li2" href="contact_us.php">Contact</a>
            </li>



            <li class="nav-item">
                <?php if (isset($_SESSION['user'])): ?>

                    <a class="nav-link li2" href="function/log-out.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Log-out
                    </a>
                <?php else: ?>

                    <a class="nav-link li2" href="login.php">
                        <i class="fa-solid fa-sign-in"></i> Login
                    </a>
                <?php endif; ?>
            </li>

            <li class="nav-item">
                <?php if (isset($_SESSION['user'])): ?>

                    <a class="nav-link li2" href="cart.php">
                        <i class="fa-solid fa-shopping-cart"></i>
                    </a>
                <?php else: ?>

                    <a class="nav-link li2" href="login.php">
                        <i class="fa-solid fa-shopping-cart"></i>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>

    <div class="books-container">

        <?php

        while ($row = $result_books->fetch(PDO::FETCH_ASSOC)) {
        ?>


            <div class="books-card">
                <div class="imgs-box">
                    <img src="../admin/img/<?= $row['image']; ?>" alt="<?= $row['name']; ?>">
                </div>

                <h3 class="book_name"> <?= $row['name']; ?></h3>

                <div class="book_desc">
                    <?= $row['desc']; ?>
                </div>

                <p class="book_type"><strong>النوع : </strong> <?= $row['type']; ?></p>
                <p class="book_type"><strong>المؤلف : </strong> <?= $row['auther']; ?></p>
                <p class="book_price"><strong>السعر : </strong> <?= $row['price']; ?> ج.م</p>

                <a href="book_details.php?id=<?= $row['id']; ?>" class="detail-btn">عرض التفاصيل</a>
            </div>



        <?php

        }



        ?>


    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>" style="background-color: #8b5a2b; color: white; border-color: #8b5a2b;">Previous</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>" style="background-color: <?= $i == $page ? '#5a3a1a' : '#8b5a2b' ?>; color: white; border-color: #8b5a2b;"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 ?>" style="background-color: #8b5a2b; color: white; border-color: #8b5a2b;">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php

    include("include/footer.php");

    ?>


</body>

</html>