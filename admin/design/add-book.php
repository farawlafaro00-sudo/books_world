<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD-BOOKS</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/datepicker3.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="icon" href="../img/images.png">


    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>





<body style="background-color:antiquewhite;">



    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color:#915831;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span style="color:antiquewhite;">BOOKS-</span>World</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="#" class="pull-left">

                                    </a>



                            <li class="divider"></li>


            </div>
            </li>




            </ul>
            </li>

            </ul>
        </div>
        </div><!-- /.container-fluid -->
    </nav>


    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color: #dbbda9;">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="../img/book.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name" style="color:#915831; font-weight:bold; text-transform:uppercase;"><?= $_SESSION['admin_session']; ?></div>
                <div class="profile-usertitle-status" style="color:white;"><span class="indicator label-primary"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>

        <ul class="nav menu" style="margin-top: 20%;">
            <li class="<?php

                        if ($test == "panel") {

                            echo "active";
                        }

                        ?>"><a href="../panel.php" style="color:#915831"><em class="fa fa-home" style="color:#915831">&nbsp;</em> Panel</a></li>
            <li class="<?php

                        if ($test == "buyers") {

                            echo "active";
                        }

                        ?>"><a href="../buyers.php" style="color:#915831"><em class="fa fa-users" style="color:#915831">&nbsp;</em> Buyers </a></li>

            <li class="<?php

                        if ($test == "books") {

                            echo "active";
                        }

                        ?>"><a href="../books.php" style="color:#915831"><em class="fa fa-book" style="color:#915831">&nbsp;</em> Books</a></li>
            <li class="<?php

                        if ($test == "orders") {

                            echo "active";
                        }

                        ?>"><a href="../order.php" style="color:#915831"><em class="fa fa-shopping-cart" style="color:#915831">&nbsp;</em> Orders</a></li>

            <li class="<?php

                        if ($test == "events") {

                            echo "active";
                        }

                        ?>"><a href="../all-events.php" style="color:#915831"><em class="fa fa-bell" style="color:#915831">&nbsp;</em> All-Events</a></li>



            <li><a href="../fun/logout.php" style="color:white;"><em class="fa fa-power-off " style="color:white;">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->





    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb" style="background-color:antiquewhite;">
                <li><a href="#">
                        <em class="fa fa-plus" style="color:brown;"></em>
                    </a></li>
                <li class="active" style="color:black;">add-book</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:brown; text-transform:uppercase;">add-book</h1>
            </div>
        </div><!--/.row-->

        <div class="panel panel-container" style="background-color:antiquewhite;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="../fun/do-add-book.php" method="POST" enctype="multipart/form-data"
                        style="background:#fff; padding:25px; border-radius:12px; box-shadow:0 0 12px rgba(0,0,0,0.1); margin-top:20px;">

                        <h3 style="color:#915831; text-align:center; margin-bottom:25px; font-weight:bold;">
                            Add Book Details
                        </h3>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Book Name</label>
                            <input type="text" name="name" class="form-control"
                                style="border-radius:8px; border:1px solid #915831;" required>
                        </div>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Upload Cover Image</label>
                            <input type="file" name="image" class="form-control"
                                style="border-radius:8px; border:1px solid #915831;">
                        </div>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Upload Pdf_File</label>
                            <input type="file" name="pdf" class="form-control"
                                style="border-radius:8px; border:1px solid #915831;">
                        </div>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Auther Name</label>
                            <input type="text" name="auther" class="form-control"
                                style="border-radius:8px; border:1px solid #915831;" required>
                        </div>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Book Description</label>
                            <textarea class="form-control" name="descr" rows="4"
                                style="border-radius:8px; border:1px solid #915831;"></textarea>
                        </div>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Type</label>
                            <input type="text" name="type" class="form-control"
                                style="border-radius:8px; border:1px solid #915831;" required>
                        </div>

                        <div class="form-group">
                            <label style="color:#915831; font-weight:bold;">Price</label>
                            <input type="text" name="price" class="form-control"
                                style="border-radius:8px; border:1px solid #915831;" required>
                        </div>







                        <button type="submit" class="btn btn-block"
                            style="background-color:#915831; color:white; 
                        padding:10px; border-radius:8px; font-size:16px; font-weight:bold;">
                            Add Details
                        </button>

                    </form>
                </div>
            </div>
        </div>


    </div> <!--/.main-->









    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/chart-data.js"></script>
    <script src="../js/easypiechart.js"></script>
    <script src="../js/easypiechart-data.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/custom.js"></script>


</body>

</html>