<?php 

session_start();
if (!isset($_SESSION["email"])) {

	header("location:login.php");
}

$ch = curl_init();
$gigs=' ';
curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Gig?filter=%7B%22where%22%3A%20%7B%22seller%22%3A%22resource%3Aorg.solar.ex.Seller%23".$_SESSION['email']."%22%7D%7D");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Accept: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$res = json_decode($result, true);
//var_dump($res);
//if ($res!=NULL)
//{
//echo($res[0]["owners"][0]);
//echo sizeof($res[0]["owners"]);
//$aut = array();



for ($i=0; $i < sizeof($res); $i++) { 



    $gigs.='<li>
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="gig-detail.html?gigId='.$res[$i]["gigId"].' ">'.$res[$i]["gigId"].'</a><span class="dashboard-status-button yellow">Expiring</span></h3>
											</div>
										</div>
									</div>
									
									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>'.$res[$i]["price"].'</strong><span>Price</span></li>
										<li><strong>'.$res[$i]["energy"].' Kw-h</strong><span>Energy</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog"  class="popup-with-zoom-anim button dark ripple-effect ico" title="Edit Bid" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
										<a href="#" class="button red ripple-effect ico" title="Cancel Bid" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>';
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
					<?php 
						$pageSide=4; include_once 'dashboardSidebar.php';
					 ?>
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
				<h3>Manage Gigs</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Gigs</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-business-center"></i> My Gig Listings</h3>
						</div>

						<div class="content">
							<ul  class="dashboard-box-list">
								
								<?php echo $gigs; ?>

								

							</ul>
						</div>
					</div>
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

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
/*						$('#gigs').html(' ');

var url = '18.224.62.217:3000';
$.ajax({

					type: "GET",
					url: 'http://'+url+'/api/org.solar.ex.Gig',
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					data: '',
					success: function (data) {
						data.forEach(function(gig) {
  							
  					$('#gigs').append('<li>'+
								'	<div class="job-listing width-adjustment">'+

										'<!-- Job Listing Details -->'+
										'<div class="job-listing-details">'+

											'<!-- Details -->'+
											'<div class="job-listing-description">'+
												'<h3 class="job-listing-title"><a href="gig-detail.html?gigId='+gig.gigId+'">'+gig.gigId+'</a><span class="dashboard-status-button yellow">Expiring</span></h3>'+
											'</div>'+
										'</div>'+
									'</div>'+
									
									'<!-- Task Details -->'+
									'<ul class="dashboard-task-info">'+
										'<li><strong>$'+gig.price+'</strong><span>Price</span></li>'+
										'<li><strong>'+gig.energy+' Kw-h</strong><span>Energy</span></li>'+
									'</ul>'+

									'<!-- Buttons -->'+
									'<div class="buttons-to-right always-visible">'+
										'<a href="#small-dialog" onclick="swal("Something Went Wrong!", "Cant Connect to Blockchain", "error");" class="popup-with-zoom-anim button dark ripple-effect ico" title="Edit Bid" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>'+
										'<a href="#" class="button red ripple-effect ico" title="Cancel Bid" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>'+
									'</div>'+
								'</li>');
							
						});
					
						
					},
					error: function(xhr){
						
						swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");

						}
				});*/

</script>

</body>
</html>