<?php



session_start();
$test = "books";

if (!isset($_SESSION['admin_session'])) {
	header("Location:index.php");
}

include("inc/conn.php");
include("inc/header.php");

$sel_books = "SELECT * FROM books";
$res_books = $pdo->query($sel_books);



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
						<em class="fa fa-book" style="color:brown;"></em>
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
				<a href="design/add-book.php">
					<button class="btn" style="background-color: #915831; color:white; margin-left:80%; margin-bottom:1%;">ADD</button>
				</a>
				<table class="table" style="width: 80%; margin-left:5%; ">
					<thead style="background-color:#915831; color:antiquewhite;">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">NAME</th>
							<th scope="col">IMAGE</th>
							<th scope="col">PDF</th>
							<th scope="col">AUTHER</th>
							<th scope="col">DESC.</th>
							<th scope="col">TYPE</th>
							<th scope="col">PRICE</th>
							<th scope="col">CONTROLS</th>



						</tr>
					</thead>
					<tbody style="background-color:antiquewhite; color:#915831; border: 1px solid #915831 ;">

						<?php

						while ($row_books = $res_books->fetch(PDO::FETCH_ASSOC)) {
						?>

							<tr>

								<th scope="row"><?= $row_books['id']; ?></th>
								<td><?= $row_books['name']; ?></td>
								<td> <img src="img/<?= $row_books['image']; ?>" alt="<?= $row_books['name'] ?>" style="width:100px; height:100px;"> </td>
								<td><?= $row_books['pdf_file']; ?></td>

								<td><?= $row_books['auther']; ?></td>
								<td><?= $row_books['desc']; ?></td>
								<td><?= $row_books['type']; ?></td>
								<td><?= $row_books['price']; ?> EGP</td>
								<td>
									<a href="design/edit-book.php?id=<?= $row_books['id'] ?>"><button class="btn" style="background-color: #915831; color:white;">EDIT-INF</button></a>
									<br>
									<br>
									<a href="fun/delete-book.php?id=<?= $row_books['id'] ?>"><button class="btn" style="background-color: white; color:#915831;">DELETE</button></a>
								</td>

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