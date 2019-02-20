<?php 

session_start();
if (!isset($_SESSION["email"])) {

	header("location:login.php");
}
$ch = curl_init();
$offers=' ';
$popup=' ';
$jq=' ';
curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Contract?filter=%7B%22where%22%3A%20%7B%22and%22%3A%20%5B%7B%22contractState%22%3A%20%22SELLER_REQUESTED%22%7D%20%2C%20%7B%22seller%22%3A%20%22resource%3Aorg.solar.ex.Seller%23".$_SESSION['email']."%22%7D%5D%7D%7D");
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

$j=0;

for ($i=0; $i < sizeof($res); $i++) { 

$j=$i+1;

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Buyer/".substr($res[$i]["buyer"], 28)."");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Accept: application/json";
curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);

$result1 = curl_exec($ch1);
if (curl_errno($ch1)) {
    echo 'Error:' . curl_error($ch1);
}
curl_close ($ch1);
$res1 = json_decode($result1, true);





    $offers.='<li id="offer'.$res[$i]["contractId"].'">
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="#"><img src="'.$res1["image"].'" alt=""></a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="#"> '.$res1["name"].' <img class="flag" src="images/flags/de.svg" alt="" title="Germany" data-tippy-placement="top"></a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><a href="mailto:'.$res1["email"].'"><i class="icon-feather-mail"></i> '.$res1["email"].'</a></span>

												<!-- Rating -->
												<div class="freelancer-rating">
													<div class="star-rating" data-rating="5.0"></div>
												</div>

												<!-- Bid Details -->
												<ul class="dashboard-task-info bid-info">
													<li><strong>$ '.$res[$i]["price"].'</strong><span> Price</span></li>
													<li><strong>'.$res[$i]["energy"].' Kw-h</strong><span>Energy</span></li>
												</ul>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
													<a href="#small-dialog-'.$j.'"  class="popup-with-zoom-anim button ripple-effect"><i class="icon-material-outline-check"></i> Accept Offer</a>
													
													<a href="#" class="button gray ripple-effect ico" title="Remove Bid" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
												</div>
											</div>
										</div>
									</div>
								</li>';

	$popup.='<div id="small-dialog-'.$j.'" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab1">Accept Offer</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Accept Offer From '.$res1["name"].'</h3>
					

				</div>
				<div id="notification'.$res[$i]["contractId"].'" class="notification success closeable">
				<p>Offer Approved Sussessfully.!</p>
				<a class="close" href="#"></a>
			</div>
					
					<ul id="info'.$res[$i]["contractId"].'" class="dashboard-task-info bid-info">
													<li><strong>$ '.$res[$i]["price"].'</strong><span>Price</span></li>
													<li><strong>'.$res[$i]["energy"].' Kw-h</strong><span>Energy</span></li>
					
					</ul>

				

				<!-- Button -->
				<button id="accept'.$res[$i]["contractId"].'" class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="button">Accept Offer</button>

			</div>

		</div>
	</div>
</div>';
$b='$class';

$c="'";
$a=''.$c.'{"'.$b.'": "org.solar.ex.AcceptContract", "contract": "resource:org.solar.ex.Contract#'.$res[$i]["contractId"].'" , "seller": "resource:org.solar.ex.Seller#'.$_SESSION["email"].'" }'.$c.'';

$n=''.$c.'<li><input readonly="readonly" type="text" value="'.$c.'+data["transactionId"]+'.$c.'"  class="with-border"><span>Transaction Id</span></li>'.$c.'';
$jq.='$("#notification'.$res[$i]["contractId"].'").hide();

$("#accept'.$res[$i]["contractId"].'").on("click", function(){

	$("#accept'.$res[$i]["contractId"].'").removeClass( "button full-width button-sliding-icon ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" );
	
		$.ajax({
					type: "POST",
					url: "http://18.224.62.217:3000/api/org.solar.ex.AcceptContract",
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					data: '.$a.',
					success: function (data) {
						
						
						$("#accept'.$res[$i]["contractId"].'").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-30" );
						$("#notification'.$res[$i]["contractId"].'").show();
      					$("#accept'.$res[$i]["contractId"].'").hide();
      					$("#offer'.$res[$i]["contractId"].'").hide();
      					$("#info'.$res[$i]["contractId"].'").html('.$n.');
						
							
					
						
					},
					error: function(xhr){
						$("#accept'.$res[$i]["contractId"].'").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-30" );
						swal("Something Went Wrong!", "Cant Connect to Blockchain", "error");

						}
				});

	});';
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
					<?php $pageSide=7; include_once 'dashboardSidebar.php';
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
				<h3>Requested Custom Offers</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Offers</li>
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
							<h3><i class="icon-material-outline-business-center"></i> Requested Custom Offers</h3>
						</div>

						<div class="content">
							<ul  class="dashboard-box-list">
								
								<?php echo $offers; ?>

								

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
<?php echo $popup; ?>
<!-- Bid Acceptance Popup / End -->


<!-- Send Direct Message Popup
================================================== -->


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
<?php echo $jq; ?>
</script>

</body>
</html>