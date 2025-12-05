<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color: #dbbda9;">
	<div class="profile-sidebar">
		<div class="profile-userpic">
			<img src="img/book.png" class="img-responsive" alt="">
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

					?>"><a href="panel.php" style="color:#915831"><em class="fa fa-home" style="color:#915831">&nbsp;</em> Panel</a></li>
		<li class="<?php

					if ($test == "buyers") {

						echo "active";
					}

					?>"><a href="buyers.php" style="color:#915831"><em class="fa fa-users" style="color:#915831">&nbsp;</em> Buyers </a></li>

		<li class="<?php

					if ($test == "books") {

						echo "active";
					}

					?>"><a href="books.php" style="color:#915831"><em class="fa fa-book" style="color:#915831">&nbsp;</em> Books</a></li>
		<li class="<?php

					if ($test == "orders") {

						echo "active";
					}

					?>"><a href="order.php" style="color:#915831"><em class="fa fa-shopping-cart" style="color:#915831">&nbsp;</em> Orders</a></li>

		<li class="<?php

					if ($test == "events") {

						echo "active";
					}

					?>"><a href="all-events.php" style="color:#915831"><em class="fa fa-bell" style="color:#915831">&nbsp;</em> All-Events</a></li>



		<li><a href="fun/logout.php" style="color:white;"><em class="fa fa-power-off " style="color:white;">&nbsp;</em> Logout</a></li>
	</ul>
</div><!--/.sidebar-->