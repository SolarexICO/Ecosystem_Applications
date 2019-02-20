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
		} ?>
		
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
						$pageSide=5; include_once 'dashboardSidebar.php';
						}elseif ($_SESSION['userType']=='seller') {
						$pageSide=5; include_once 'dashboardSidebar.php';
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
				<h3>Post a Gig</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Post a Gig</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">
				<form id="postGig-form">
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">
						<input type="text" hidden="hidden" id="seller" value="<?php echo $_SESSION['email']; ?>">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-feather-folder-plus"></i> Gig Submission Form</h3>
						</div>

						<div class="content with-padding padding-bottom-10">
							<div class="row">

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Gig Title</h5>
										<input id="gigTitle" type="text" class="with-border" placeholder="e.g. solar energy with good...">
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Location</h5>
										<select id="location" class="selectpicker with-border" data-size="7" title="Select Location">
											<option value="1">Admin Support</option>
											<option value="2">Customer Service</option>
											
										</select>
									</div>
								</div>

								

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>What is your Rate?</h5>
										<div class="row">
											<div class="col-xl-6">
												<div class="input-with-icon">
													<input id="price" class="with-border" type="text" placeholder="Price">
													<i class="currency">USD</i>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="input-with-icon">
													<input id="energy" class="with-border" type="text" placeholder="Energy">
													<i class="currency">Kw-h</i>
												</div>
											</div>
										</div>
										
									</div>
								</div>

								

								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Describe Your Gig</h5>
										<textarea id="description" cols="30" rows="5" class="with-border"></textarea>
										
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				</form>
				<div class="col-xl-3">
					<button  id="postGig" class="button ripple-effect button-sliding-icon full-width margin-top-30"> Post Gig</button>
				</div>
				
			</div>
			<!-- Row / End -->

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
<script src="js/sweetalert.js"></script>
<script src="js/jquerysession.js"></script>
<script src="js/custom.js"></script>
<script src="js/post-gig.js"></script>

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
//alert($('#seller').val());
</script>






</body>
</html>