<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books-World | Sign-Up</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link rel="icon" href="img/book.png">

</head>
<style>
    body {
        background: white;
        padding-top: 60px;
        font-size: 14px;
        color: #444444;
        font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .no-padding {
        padding: 0;
        margin: 0;
    }

    .fa-xl {
        font-size: 2em;
    }

    input.form-control {
        border: 1px solid #ddd;
        box-shadow: none;
        height: 46px;
    }

    .bootstrap-table input.form-control {
        height: 34px;
    }

    .input-group-btn .btn {
        height: 46px;

    }

    .form-control:focus {
        border: 1px solid black;
        outline: 0;
        box-shadow: inset 0px 0px 0px 1px black;
    }

    .has-success .form-control,
    .has-success .form-control:focus {
        border: 1px solid #8ad919;
    }

    .has-warning .form-control,
    .has-warning .form-control:focus {
        border: 1px solid #ffb53e;
    }

    .has-error .form-control,
    .has-error .form-control:focus {
        border: 1px solid #f9243f;
    }
</style>

<body>




    <div class="container" style="width: 80%; height:500px; background-color:white; position:relative; margin-top:5%; ">
        <div class="row">
            <img src="img/book.jpg" alt="banner-sign-up" style=" position:absolute; width:55%; height:100%; margin-left:520px; ">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="width:450px; height: 430px;  position:absolute; margin-left:-350px; background-color:#f1f4f7; align-content:center; margin-top:10%;">

                    <div class="panel-heading  " style="text-align: center; font-weight:bold; color:black; background-color:#f1f4f7; font-size:35px; "> Register </div>
                    <div class="panel-body">
                        <form role="form" action="fun/sign.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Your name" name="name" type="text" autofocus="">

                                </div>
                                <br>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Your Email" name="email" type="email">

                                </div>
                                <br>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">

                                </div>


                                <br>
                                <button Type="submit" class="btn btn" style="background-color:black; color:white; margin-left:40%;" name="sign">Sign</button>

                            </fieldset>
                        </form>
                    </div>
                    <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                        <p class="mx-auto mb-6 leading-normal text-sm">Already have an account? <a href="index.php"
                                class="font-semibold  bg-clip-text bg-gradient-to-tl " style="color: black;">
                                Login</a></p>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div> <!-- /.container -->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>