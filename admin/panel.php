<?php
session_start();

$test = "panel";

if (!isset($_SESSION['admin_session'])) {
	header("Location:index.php");
}
include("inc/conn.php");
include("inc/header.php");



// عدد الكتب اللي وصلت
$sel_book = $pdo->query("SELECT COUNT(*) AS count FROM books");
$res_book = $sel_book->fetch(PDO::FETCH_ASSOC);
$rece_book = $res_book['count'];

// العدد الكلي للكتب
$tot_book = 100;

//  حساب النسبة المئوية للكتب
$percent_book = ($tot_book > 0) ? ($rece_book / $tot_book) * 100 : 0;



// عدد المستخدمين اللي وصلت
$sel_buyer = $pdo->query("SELECT COUNT(*) AS count FROM buyer");
$res_buyer = $sel_buyer->fetch(PDO::FETCH_ASSOC);
$rece_buyer = $res_buyer['count'];

// العدد الكلي المستخدمين
$tot_buyer = 100;

//  حساب النسبة المئوية المستخدمين
$percent_buyer = ($tot_buyer > 0) ? ($rece_buyer / $tot_buyer) * 100 : 0;


// عدد الرسائل اللي وصلت
$stmt = $pdo->query("SELECT COUNT(*) AS count FROM message");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$received = $row['count'];

// العدد الكلي للرسائل
$total = 100;

// حساب النسبة المئوية
$percentage = ($total > 0) ? ($received / $total) * 100 : 0;



// عدد الطلبات اللي وصلت
$sel_order = $pdo->query("SELECT COUNT(*) AS count FROM orders");
$res_order = $sel_order->fetch(PDO::FETCH_ASSOC);
$rece_order = $res_order['count'];

// العدد الكلي للرسائل
$tot_order = 100;

// حساب النسبة المئوية
$percent_order = ($tot_order > 0) ? ($rece_order / $tot_order) * 100 : 0;







$select_mess = "SELECT * FROM message";
$result_mess = $pdo->query($select_mess);


$sel_time = "SELECT * FROM timeline_events  ORDER BY created_at DESC LIMIT 4";

$res_time = $pdo->query("$sel_time");


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
						<em class="fa fa-home" style="color:brown;"></em>
					</a></li>
				<li class="active" style="color:black;"><?php echo $test ?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="color:brown; text-transform:uppercase;"><?php echo $test ?></h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container" style="background-color:#915831;">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart" style="color:antiquewhite; width:<?php echo $percent_order   ?>;"></em>
							<div class="large" style="color:white"><?php echo round($percent_order, 2);   ?></div>
							<div class="text-muted">All Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments" style=" color:antiquewhite; width: <?php echo $percentage; ?>;"></em>
							<div class="large" style="color:white"><?php echo round($percentage, 2); ?></div>
							<div class="text-muted">All Comments</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users " style="color:antiquewhite; width: <?php echo $percent_buyer; ?>;"></em>
							<div class="large" style="color:white"><?php echo round($percent_buyer, 2); ?></div>
							<div class="text-muted">All Buyers</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book " style="color:antiquewhite;  width: <?php echo $percent_book; ?>;"></em>
							<div class="large" style="color:white"><?php echo round($percent_book, 2); ?></div>
							<div class="text-muted">All Books</div>
						</div>
					</div>
				</div>

			</div><!--/.row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default" style="background-color: #915831;">
					<div class="panel-heading" style="background-color: #915831; color:white; font-weight:bold;">
						Site Overview

						<span class="pull-right clickable panel-toggle panel-button-tab-left" style="background-color: #915831; color:white;"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class=" panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600" style="background-color: #915831; color:white;"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4 style=" color:brown;">Orders</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $percent_order  ?>"><span class="percent" style=" color:brown;"><?php echo round($percent_order, 2); ?>%</span></div>
					</div>
				</div>
			</div>
			<div class=" col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4 style=" color:brown;">Comments</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $percentage; ?>"><span class="percent" style=" color:brown;"><?php echo round($percentage, 2); ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4 style=" color:brown;">Buyers</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $percent_buyer ?>"><span class="percent" style=" color:brown;"><?php echo round($percent_buyer, 2); ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4 style=" color:brown;">Books</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $percent_book; ?>"><span class="percent"><?php echo round($percent_book, 2); ?>%</span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default chat">
					<div class="panel-heading" style="background-color: #915831; color:white;">
						Chat

						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body" id="ref">
						<ul>
							<?php

							while ($row_mess = $result_mess->fetch(PDO::FETCH_ASSOC)) {
							?>
								<li class="right clearfix">
									<div class="chat-body clearfix">
										<div class="header"><strong class="pull-left" style="color: #915831;"><?= $row_mess['name'];  ?></strong> <small class="text-muted"><?= $row_mess['creat_at']; ?></small></div>
										<p><?= $row_mess['mess']; ?></p>
									</div>
								</li>
							<?php

							}

							?>


						</ul>
					</div>
					<div class="panel-footer" style="background-color: #915831;">

					</div>
				</div>

			</div><!--/.col-->


			<div class="col-md-6">
				<div class="panel panel-default ">
					<div class="panel-heading" style="background-color: #915831; color:white;">
						Timeline

						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<?php while ($row_time = $res_time->fetch(PDO::FETCH_ASSOC)) { ?>
								<li>
									<div class="timeline-badge" style="background-color: <?php echo $row_time['color']; ?>;">
										<em class="glyphicon <?php echo $row_time['icon']; ?>" style="color:antiquewhite;"></em>
									</div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title"><?php echo htmlspecialchars($row_time['title']); ?></h4>
											<small style="color:gray;">
												<?php echo htmlspecialchars($row_time['user_name']); ?> — <?php echo $row_time['created_at']; ?>
											</small>
										</div>
										<div class="timeline-body">
											<p><?php echo nl2br(htmlspecialchars($row_time['description'])); ?></p>
										</div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Made With ❤ by <a href="https://www.facebook.com/farawla.elkhatib?mibextid=ZbWKwL" target="_blank">ENG/Farawla🍓</a></p>
			</div>
		</div><!--/.row-->
	</div> <!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function() {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>

</body>

</html>