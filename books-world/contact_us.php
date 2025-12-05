<!DOCTYPE html>
<html lang="AR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="../admin/img/book.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #512b08ff;
            font-family: fantasy;
        }

        .header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../admin/img/contact.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: #ffffffff;
            text-align: center;
        }

        .header h1 {
            font-size: 48px;
            font-weight: bold;
        }

        .contact-box {
            background: antiquewhite;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .contact-box h3 {
            text-align: center;
            color: #512b08ff;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .btn-send {
            background: #5d3c00ff;
            ;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            transition: 0.3s;
            margin-right: 35%;
        }

        .btn-send:hover {
            background: #512b08ff;
            color: antiquewhite;
        }

        .info-box {
            background: antiquewhite;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .info-box h4 {
            text-align: center;
            color: #512b08ff;
            font-weight: bold;
        }
        .info-box p{
            color: #512b08ff;
        }

        .icon {
            font-size: 32px;
            margin-left: 10px;
            color: #8a4fff;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>تواصل معنا</h1>
        <p>يسعدنا دائمًا مساعدتك والإجابة عن جميع استفساراتك.</p>

    </div>

    <div class="container py-5">
        <div class="row g-4">

            <!-- Contact Form -->
            <div class="col-md-7">
                <div class="contact-box">
                    <h3 class="mb-4"> تواصل معنا</h3>
                    <hr>
                    <form action="../admin/fun/mess.php" method="post">
                        <div class="mb-3">
                            <label>الاسم : </label>
                            <input type="text" class="form-control" placeholder="اكتب اسمك هنا" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label>البريد الإلكتروني : </label>
                            <input type="email" class="form-control" placeholder="example@email.com" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label>الرسالة : </label>
                            <textarea class="form-control" rows="5" placeholder="اكتب رسالتك هنا..." name="mess" required></textarea>
                        </div>
                        <button class="btn-send">إرسال</button>
                    </form>
                </div>
            </div>

            <!-- Info -->
            <div class="col-md-5">
                <div class="info-box">
                    <h4 class="mb-3">معلومات التواصل</h4>
                    <hr>

                    <p><span class="icon">📞</span> 01096713393</p>
                    <p><span class="icon">📧</span> farawlafaro00@gmail.com</p>
                    <p><span class="icon">📍</span>Egypt , AD Daqahliyah , EL Mansoura , AL Galaa street.</p>

                    <hr>

                    <h4 class="mb-3">مواعيد الدعم</h4>
                    <p>السبت - الخميس</p>
                    <p>10 صباحًا - 10 مساءً</p>

                    <hr>


                </div>
            </div>

        </div>
    </div>

</body>

</html>