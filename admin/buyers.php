<?php
session_start();
$test = "buyers";

if (!isset($_SESSION['admin_session'])) {
    header("Location:index.php");
}

include("inc/conn.php");
include("inc/header.php");

$sel_buyer = "SELECT * FROM buyer";
$res_buyer = $pdo->query($sel_buyer);



?>



<body style="background-color:antiquewhite;">

    <?php

    include("inc/nav.php");
    include("inc/sidbar.php");

    ?>



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb" style="background-color:antiquewhite;">
                <li><a href="#">
                        <em class="fa fa-users" style="color:brown;"></em>
                    </a></li>
                <li class="active" style="color:black; "><?php echo  $test ?></li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:brown; text-transform:uppercase;"><?php echo $test ?></h1>
            </div>
        </div><!--/.row-->

        <div class="panel panel-container" style="background-color:antiquewhite;">
            <div class="row">


                <table class="table" style="width: 80%; margin-left:5%; ">
                    <thead style="background-color:#915831; color:antiquewhite;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">ADDRESS</th>



                        </tr>
                    </thead>
                    <tbody style="background-color:antiquewhite; color:#915831; border: 1px solid #915831 ;">

                        <?php

                        while ($row_buyer = $res_buyer->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $row_buyer['id']; ?></th>
                                <td><?= $row_buyer['name']; ?></td>
                                <td><?= $row_buyer['email']; ?></td>
                                <td><?= sha1($row_buyer['password']); ?></td>
                                <td><?= $row_buyer['address']; ?></td>


                            </tr>


                        <?php
                        }


                        ?>




                    </tbody>
                </table>


            </div><!--/.row-->
        </div>

    </div> <!--/.main-->









    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>