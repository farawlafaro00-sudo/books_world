<?php
include("include/connect.php");
include("include/header.php");

$select_book = "SELECT * FROM books LIMIT 3";
$results = $pdo->query($select_book);

$sel = " SELECT * FROM books ORDER BY id DESC ";
$res = $pdo->query($sel);
$row = $res->fetch(PDO::FETCH_ASSOC);

?>


<body>

    <?php

    include("include/nav.php");

    ?>
    <!-- slider  -->
    <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="slider-box">
                    <img src="images/banner.png" class="d-block w-100 slider-img">
                    <div class="slider-text">
                        <h2>اكتشف أجمل الكتب</h2>
                        <p>مكتبة تجمع لك كل ما تحب بلمسة من الهدوء</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="slider-box">
                    <img src="images /banner.png" class="d-block w-100 slider-img">
                    <div class="slider-text">
                        <h2>عالم من الروايات</h2>
                        <p>اختار قصتك المفضلة وابدء الرحلة</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="slider-box">
                    <img src="images/banner.png" class="d-block w-100 slider-img">
                    <div class="slider-text">
                        <h2>راحة.. قهوة.. وكتاب</h2>
                        <p>المكان المثالي لليوم المثالي</p>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <!-- end slider  -->




    <div class="container">

        <div class="row">
            <div class="col-md-6 ">
                <div class="image-box">
                    <img class="pixel" src="images/6c.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2 class=" gradient-text2">
                            مرحباً بك في عالمٍ يصنع الفرق

                        </h2>
                    </div>
                    <p>
                        هنا، حيث تبدأ الرحلات التي لا تقيدها حدود.
                        في عالم الكتب لن تجد مجرد صفحات وحروف، بل عوالم كاملة تنتظرك،
                        وأبواباً تُفتح لك وحدك… لتأخذك إلى أماكن لم تزورها من قبل.

                        اكتشف كنوز الأدب، واستمتع بقراءة مراجعات ثرية،
                        وتصفح إصدارات مختارة بعناية لتناسب ذوقك وتلهم فكرك.
                        هنا، ستجد الكتاب الذي يغيّر يومك… وربما يغيّر حياتك.
                    </p>


                </div>
            </div>
        </div>
    </div>


    <div class="real-book">
        <div class="cover"></div>

        <div class="pages">
            <div class="page right-page">
                <h2> القربان</h2>
                <p>أذكر نفسي دائما بالنظر إلي الأمور
                    من كافة الإتجاهات ووجهات النظر,
                    فربما أجد شئ من الحقيقة بينها,
                    أذكر نفسي أن كل ما نراه ليس حقيقيا تماما,
                    وإنما هو فقط معروض من زوابا مختلفة ووجهات نظر عابرة !
                </p>
                <span>مروى جوهر</span>
            </div>
        </div>
    </div>












    <?php

    while ($row_books = $results->fetch(PDO::FETCH_ASSOC)) {
    ?>


        <div class="products-wrapper">

            <div class="product-card">
                <div class="product-image">
                    <img src="../admin/img/<?= $row_books['image']; ?>" alt="<?= $row_books['name']; ?>">
                </div>

                <div class="product-info">
                    <h3 class="product-title"> <?= $row_books['name']; ?></h3>
                    


                    
                   

                    <div class="product-price"><?= $row_books['price']; ?>EGP </div>
                    <a href="books.php?id=<?= $row_books['id']; ?>"><button class="product-btn">عرض التفاصيل</button></a>
                </div>
            </div>


        </div>








    <?php

    }




    ?>



























    <section class="about-section">
        <div class="about-img">
            <img src="images/logo.png" alt="">

        </div>

        <div class="about">

            <span class="social"><i class="fa-brands fa-facebook"></i> : Farawla Elkhatib.</span>

            <span class="social"><i class="fa-solid fa-envelope"></i> : farawlafaro00@gmail.com.</span>

            <span class="social"><i class="fa-brands fa-whatsapp"></i> : +201096713393.</span>
            <span class="social"><i class="fa-solid fa-map-marker"></i> : Egypt , AD Daqahliyah , EL Mansoura , AL Galaa street.</span>
        </div>

        <div class="about-content">
            <h2> من نحن ؟</h2>

            <p>
                نحن مكان صغير دافئ بيجمع بين حب القراءة وراحة البال.
                هدفنا إننا نقدم كتب مختارة بعناية لكل عاشق للقراءة
                مع تجربة تصفّح بسيطة وهادئة تليق بوقتك الثمين.
            </p>

            <p>
                هنا هتلاقي عالم من الروايات، الكتب الملهمة، والمحتوى
                اللي يصنعلك لحظات هدوء… مع فنجان قهوتِك المفضل☕


            </p>



        </div>


    </section>


    <?php


    include("include/footer.php");

    ?>


</body>

</html>