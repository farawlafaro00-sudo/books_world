<?php
session_start();
$test = "orders";

if (!isset($_SESSION['admin_session'])) {
    header("Location:index.php");
}


include("inc/conn.php");
include("inc/header.php");

$sel_order = "SELECT * FROM orders";
$res_order = $pdo->query($sel_order);



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
                        <em class="fa fa-shopping-cart" style="color:brown;"></em>
                    </a></li>
                <li class="active" style="color:black;"><?php echo $test ?></li>
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
                            <th scope="col">IMAGE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">QUANTITY.</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">BOOK_ID</th>
                            <th scope="col">BUYER_NAME</th>
                            


                        </tr>
                    </thead>
                    <tbody style="background-color:antiquewhite; color:#915831; border: 1px solid #915831 ;">

                        <?php

                        while ($row_order = $res_order->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $row_order['id']; ?></th>
                                <td><?= $row_order['name']; ?></td>
                                <td> <img src="img/<?= $row_order['image'] ?>" alt="<?= $row_order['name']; ?>" style="width:100px; height:100px;"> </td>
                                <td><?= $row_order['price']; ?></td>
                                <td><?= $row_order['quantity']; ?></td>
                                <td><?= $row_order['total']; ?></td>
                                <td><?= $row_order['book_id']; ?></td>
                                <td><?= $row_order['buyer_name']; ?></td>
                                


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