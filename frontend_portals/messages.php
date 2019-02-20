<?php 
session_start(); 
if (!isset($_SESSION["email"])) {

	header("location:login.php");
}
?>
<!doctype html>

<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Hireo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">

</head>
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth dashboard-header not-sticky">

	<!-- Header -->
	<div id="header" >
		
		<?php if ($_SESSION['userType']=='buyer') {
			$pageTop=2; include_once 'header.php';
		}elseif ($_SESSION['userType']=='seller') {
			$pageTop=3; include_once 'header.php';
		}  ?>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					

						<?php if ($_SESSION['userType']=='buyer') {
						$pageSide=2; include_once 'dashboardSidebar.php';
						}elseif ($_SESSION['userType']=='seller') {
						$pageSide=2; include_once 'dashboardSidebar.php';
					} ?>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Messages</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Messages</li>
					</ul>
				</nav>
			</div>
	
				<div class="messages-container margin-top-0">

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox">
							<div class="messages-headline">
								<div class="input-with-icon">
										<input id="autocomplete-input" type="text" placeholder="Search">
									<i class="icon-material-outline-search"></i>
								</div>
							</div>

						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">

							<div class="messages-headline">
								<h4>----</h4>
								<a href="#" class="message-action"><i class="icon-feather-trash-2"></i> Delete Conversation</a>
							</div>
							
							<!-- Message Content Inner -->
							<div class="message-content-inner">
									
									<!-- Time Sign -->
									<div class="message-time-sign">
										<span>28 June, 2018</span>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt="" /></div>
											<div class="message-text"><p>-------------</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt="" /></div>
											<div class="message-text"><p>-----------</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt="" /></div>
											<div class="message-text"><p>-------------------------</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<!-- Time Sign -->
									<div class="message-time-sign">
										<span>Yesterday</span>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt="" /></div>
											<div class="message-text"><p>---------------------------------</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt="" /></div>
											<div class="message-text"><p>---------------------------</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt="" /></div>
											<div class="message-text"><p>-----------------------</p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt="" /></div>
											<div class="message-text">
												<!-- Typing Indicator -->
												<div class="typing-indicator">
													<span></span>
													<span></span>
													<span></span>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
							</div>
							<!-- Message Content Inner / End -->
							
							<!-- Reply Area -->
							<div class="message-reply">
								<textarea cols="1" rows="1" placeholder="Your Message" data-autoresize></textarea>
								<button class="button ripple-effect">Send</button>
							</div>

						</div>
						<!-- Message Content -->

					</div>
			</div>
			<!-- Messages Container / End -->



			
			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<?php include_once 'footer-dash.php'; ?>
			</div>
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Add Note</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Do Not Forget 😎</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="add-note">

					<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
						<option>Low Priority</option>
						<option>Medium Priority</option>
						<option>High Priority</option>
					</select>

					<textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Apply for a job popup / End -->


<!-- Scripts
================================================== -->
<script src="js/include.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/snackbar.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>


</body>
</html>