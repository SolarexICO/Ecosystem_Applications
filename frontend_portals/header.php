<?php 
session_start();

$das='';
$das1='';

$a= array();
for ($i=1; $i < 6 ; $i++) { 
	if($i==$pageTop){
		$a[$i]='class="current"';
		
	}
	else
	{

		$a[$i]=" ";
		
	}
	
}

$sel='<li><a '.$a[3].'  href="javascript:;">For Sellers</a>
							<ul class="dropdown-nav">
								
								<li><a href="post-gig.php">Post Gig</a></li>
								
							</ul>
						</li>';

$buy='<li><a '.$a[2].'  href="javascript:;">For Buyers</a>
							<ul class="dropdown-nav">
								<li><a  href="gigs-list.php">Browse Gigs</a></li>
								<li><a href="sellers-list.php">Browse Sellers</a></li>
							</ul>
						</li>';


if (isset($_SESSION["email"])) { 

	if ($_SESSION["userType"]=="seller") {
		$das='<li><a href="dashboard-seller.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>';

		$das1='<li><a  '.$a[5].'  href="dashboard-seller.php">Dashboard</a>
							<ul class="dropdown-nav">
								
							</ul>
						</li>';
		$buy=' ';

	} 
	else if ($_SESSION["userType"]=="buyer") {
		$das='<li><a href="dashboard-buyer.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>';

		$das1='<li><a  '.$a[5].'  href="dashboard-buyer.php">Dashboard</a>
							<ul class="dropdown-nav">
								
							</ul>
						</li>';

		$sel=' ';
	}
	
	$loginNav='';

	$userNav='<div class="header-widget hide-on-mobile">
					
					<!-- Notifications -->
					


					<div class="header-notifications">

						<!-- Trigger -->
						<div class="header-notifications-trigger">
							<a href="#"><i class="icon-feather-bell"></i></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<div class="header-notifications-headline">
								<h4>Notifications</h4>
								<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
									<i class="icon-feather-check-square"></i>
								</button>
							</div>

							

						</div>

					</div>
					
					<!-- Messages -->
					<div class="header-notifications">
						<div class="header-notifications-trigger">
							<a href="#"><i class="icon-feather-mail"></i></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<div class="header-notifications-headline">
								<h4>Messages</h4>
								<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
									<i class="icon-feather-check-square"></i>
								</button>
							</div>

							

						</div>
					</div>

				</div>';

	$userMenu='<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#"><div class="user-avatar status-online"><img src="'.$_SESSION["userPic"].'" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="'.$_SESSION["userPic"].'" alt=""></div>
									<div class="user-name">
										'.$_SESSION["name"].' <span>'.$_SESSION["userType"].'</span>
									</div>
								</div>
								
								<!-- User Status Switcher -->
								<div class="status-switch" id="snackbar-user-status">
									<label class="user-online current-status">Online</label>
									<label class="user-invisible">Invisible</label>
									<!-- Status Indicator -->
									<span class="status-indicator" aria-hidden="true"></span>
								</div>	
						</div>
						
						<ul class="user-menu-small-nav">
							'.$das.'
							<li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li><a href="logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>

						</div>




					</div>

				</div>';
}
else{
	$userMenu='';
	$userNav='';
	$loginNav='<div class="header-widget hide-on-mobile">
	<nav id="navigation">
					<ul id="responsive">

						<li><a '.$a[5].'  href="login.php"> <span class="icon-feather-user"></span>&nbsp; LogIn / SignUp</a>
							
						</li>

						

						

					</ul>
				</nav>
				</div>';
}

echo '<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						<li ><a '.$a[1].'   href="index.php">Home</a>
							<ul class="dropdown-nav">
								
							</ul>
						</li>

						'.$buy.$sel.$das1.'

						

						<li><a  '.$a[4].'  href="contact.php">Contact</a>
							<ul class="dropdown-nav">
								
							</ul>
						</li>

						

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">

				<!--  User Notifications -->
				'.$userNav.'
				<!--  User Notifications / End -->
				
					
					<!-- Notifications -->
					

					'.$loginNav.'
				
					
					<!-- Messages -->
					

				


				<!-- User Menu -->
				'.$userMenu.'
				<!-- User Menu / End -->

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

		</div>';



 ?>