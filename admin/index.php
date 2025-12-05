 <?php
	
	session_start();
	include("inc/conn.php");


	// لو المستخدم مسجل دخول، رجعيه للصفحة الرئيسية

	if (isset($_SESSION['admin_session'])) {
		header("Location:panel.php");
		exit();
	}

	$errors = isset($_SESSION['user_error']) ? $_SESSION['user_error'] : [];
	unset($_SESSION['user_error']);

	?>
 <!DOCTYPE html>
 <html>

 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Books-World | Login</title>
 	<link href="css/bootstrap.min.css" rel="stylesheet">
 	<link href="css/datepicker3.css" rel="stylesheet">
 	<link rel="icon" href="img/book.png">

 </head>
 <style>
 	body {
 		background: antiquewhite;
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
 		border: 1px solid #915831;
 		outline: 0;
 		box-shadow: inset 0px 0px 0px 1px #915831;
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




 	<div class="container" style="width: 80%; height:500px; background-color:#915831; position:relative; margin-top:3%; ">
 		<div class="row">
 			<img src="img/463.jpg" alt="banner-login" style=" position:absolute; width:53%; height:100%; margin-left:50%; ">
 			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
 				<div class="login-panel panel panel-default" style="width:450px; height: 430px;  position:absolute; margin-left:-350px; background-color:#915831; align-content:center; margin-top:10%;">

 					<div class="panel-heading" style="text-align: center; font-weight:bold; color:antiquewhite; background-color:#915831; font-size:35px; "> Login </div>
 					<div class="panel-body">
 						<form role="form" action="fun/login.php" method="POST">
 							<fieldset>
 								<div class="form-group">
 									<input class="form-control" placeholder="Your name" name="name" type="text" autofocus="" style="background-color: antiquewhite; color:#915831;">
 									<?php if (isset($errors['name'])): ?>

 										<div style="color: white; margin-left:100px;"><?php echo $errors['name']; ?></div>
 									<?php endif; ?>
 								</div>
 								<br>

 								<div class="form-group">
 									<input class="form-control" placeholder="Your Email" name="email" type="email" style="background-color: antiquewhite; color:#915831;">
 									<?php if (isset($errors['email'])): ?>

 										<div style="color: white;  margin-left:100px;"><?php echo $errors['email']; ?></div>
 									<?php endif; ?>
 								</div>
 								<br>

 								<div class="form-group">
 									<input class="form-control" placeholder="Password" name="password" type="password" style="background-color: antiquewhite; color:#915831;">
 									<?php if (isset($errors['password'])): ?>

 										<div style="color: white; margin-left:100px;"><?php echo $errors['password']; ?></div>
 									<?php endif; ?>
 								</div>

 								<?php if (isset($errors['login'])): ?>

 									<div style="color: white; margin-left:30%;"><?php echo $errors['login']; ?></div>
 								<?php endif; ?>
 								<br>
 								<button Type="submit" class="btn btn" style="background-color:antiquewhite; color:#915831; margin-left:40%; font-weight:bold;" name="admin_session">Login</button>

 							</fieldset>
 						</form>
 					</div>
 					<div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
 						<p class="mx-auto mb-6 leading-normal text-sm" style="color: white;">Don't have an account? <a href="sign-up.php"
 								class="font-semibold  bg-clip-text bg-gradient-to-tl " style="color:antiquewhite; font-weight:bold;">Register
 							</a></p>
 					</div>
 				</div>
 			</div><!-- /.col-->
 		</div><!-- /.row -->
 	</div> <!-- /.container -->

 	<script src="js/jquery-1.11.1.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 </body>

 </html>