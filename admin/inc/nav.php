<?php
include("conn.php");

$mess = "SELECT COUNT(*) FROM message";
$res = $pdo->query($mess);
$do = $res->fetch(PDO::FETCH_ASSOC);
$rows = $do['COUNT(*)'];

$select = "SELECT * FROM message  ORDER BY creat_at DESC LIMIT 2";
$result = $pdo->query($select);

?>


<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color:#915831;">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span></button>
			<a class="navbar-brand" href="#"><span style="color:antiquewhite;">BOOKS-</span>World</a>
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger"> <?php echo "$rows"; ?> </span>
					</a>
					<ul class="dropdown-menu dropdown-messages">
						<li>
							<div class="dropdown-messages-box"><a href="#" class="pull-left">

								</a>
								<?php

								while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


								?>

									<div class="message-body">

										<a href="#ref"> <strong><?= $row['name']; ?></strong></a>
										<br><br>
										<p><?= $row['mess']; ?></p>
										<small class="text-muted"><?= $row['creat_at']; ?></small>
									</div>
						<li class="divider"></li>

					<?php
								}


					?>
		</div>
		</li>




		</ul>
		</li>

		</ul>
	</div>
	</div><!-- /.container-fluid -->
</nav>