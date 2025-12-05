<?php
session_start();
?>


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