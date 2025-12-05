<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About_Us</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../admin/img/book.png">
    <style>
        body {
            background: antiquewhite;
            font-family: fantasy;
            color: #763f0c;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('images/banner.png');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: antiquewhite;
            text-align: center;
        }

        .hero h1 {
            font-size: 55px;
            font-weight: bold;
        }

        .hero p {

            font-size: 20px;
            color: #fff;

        }

        .section-title {

            font-size: 40px;
            margin-bottom: 25px;
            font-weight: bold;
            color: #763f0c;
        }

        .about-box {
            background: #763f0c;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .about-box h4 {
            color: antiquewhite;
            font-size: 30px;
        }

        .about-box p {
            color: #fff;
            font-size: 19px;
        }

        .about-box li {
            font-size: 19px;
            color: #fff;
        }


        .icon {
            font-size: 40px;
            color: #763f0c;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>


    <section class="hero">
        <h1>من نحن؟؟ </h1>
        <p>عالم الكتب الذي يجمع بين الشغف، الإبداع، ومتعة القراءة.</p>
    </section>

    <div class="container py-5">
        <h2 class="section-title text-center">قصتنا</h2>
        <div class="about-box">
            <p>
                نحن منصة مخصّصة لعشّاق الكتب والروايات. نسعى لتقديم أفضل الكتب بشكل مبسّط ومنظم، مع تجربة تصفح ممتعة
                تناسب كل محبي القراءة. هدفنا هو بناء عالم ثقافي يليق بكم ويجمع بين الشغف والمعرفة.
            </p>
        </div>

        <h2 class="section-title text-center">رؤيتنا</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="about-box">
                    <div class="icon">📚</div>
                    <h4>ننشر الثقافة</h4>
                    <br>
                    <p>نعمل على جعل الوصول للمعرفة أسهل وأمتع للجميع.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-box">
                    <div class="icon">✨</div>
                    <h4>نخلق الإلهام</h4>
                    <br>
                    <p>كل كتاب هو عالم جديد، ونحن نفتح لكِ الأبواب إليه.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-box">
                    <div class="icon">🤝</div>
                    <h4>نبني مجتمعًا</h4>
                    <br>
                    <p>نسعى لتجميع القرّاء في مساحة واحدة يتشاركون فيها نفس الشغف.</p>
                </div>
            </div>
        </div>



        <h2 class="section-title text-center">لماذا نحن؟</h2>
        <div class="about-box">
            <ul style="font-size:18px; line-height:2;">

                <li>تصميم بسيط وسهل الاستخدام.</li>
                <li>عرض الكتب بشكل جذاب ومنظم.</li>
                <li>صفحات تفاصيل مميزة لكل كتاب.</li>
                <li> هنا هتلاقي عالم من الروايات، الكتب الملهمة، والمحتوى
                    اللي يصنعلك لحظات هدوء… مع فنجان قهوتِك المفضل☕
                </li>


            </ul>
        </div>
    </div>








    <?php

    include("include/footer.php");

    ?>


</body>

</html>