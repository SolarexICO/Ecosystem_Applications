<?php 

session_start();
$ch = curl_init();
$gigs=' ';
curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Gig");
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



    $gigs.='<a 
  					 href="gig-detail.php?gigId='.$res[$i]["gigId"].'" class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">
							<img src="images/job-category-08.jpg" alt="">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company">'.substr($res[$i]["seller"], 29).'<span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h4>
							<h3 class="job-listing-title">'.$res[$i]["title"].'</h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						
						<ul>
							<li><i class="icon-material-outline-location-on"></i> San Francisco</li> </br>
							
							<li><i class="icon-material-outline-account-balance-wallet"></i> $'.$res[$i]["price"].'       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
							<li><i class="icon-material-outline-access-time"></i>'.$res[$i]["energy"].' Kw-h</li>
						</ul>
					</div>
				</a>';
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
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header" >
		<?php  
			$pageTop=2; include_once 'header.php';
		 ?>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Spacer -->
<div class="margin-top-90"></div>
<!-- Spacer / End-->

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4">
			<div class="sidebar-container">
				
				<!-- Location -->
				<div class="sidebar-widget">
					<h3>Location</h3>
					<div class="input-with-icon">
						<div id="autocomplete-container">
							<input id="autocomplete-input" type="text" placeholder="Location">
						</div>
						<i class="icon-material-outline-location-on"></i>
					</div>
				</div>

				<!-- Keywords -->
				<div class="sidebar-widget">
					<h3>Keywords</h3>
					<div class="keywords-container">
						<div class="keyword-input-container">
							<input type="text" class="keyword-input" placeholder="e.g. job title"/>
							<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
						</div>
						<div class="keywords-list"><!-- keywords go here --></div>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<!-- Category -->
				<div class="sidebar-widget">
					<h3>Category</h3>
					<select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" >
						
					</select>
				</div>
				
				<!-- Job Types -->
				
				<!-- Tags -->
				

			</div>
		</div>
		<div class="col-xl-9 col-lg-8 content-left-offset">

			<h3 class="page-title">Search Results</h3>

			<div class="notify-box margin-top-15">
				<div class="switch-container">
					<label class="switch"><input type="checkbox"><span class="switch-button"></span><span class="switch-text">Turn on email alerts for this search</span></label>
				</div>

				<div class="sort-by">
					<span>Sort by:</span>
					<select class="selectpicker hide-tick">
						<option>Relevance</option>
						<option>Newest</option>
						<option>Oldest</option>
						<option>Random</option>
					</select>
				</div>
			</div>

			<div id="gigs" class="listings-container grid-layout margin-top-35">
				
				<!-- Job Listing -->
				<?php echo $gigs;  ?>	

				<!-- Job Listing -->
				

			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-30 margin-bottom-60">
						<nav class="pagination">
							<ul>
								<li class="pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li><a href="#" class="current-page">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li class="pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>
	</div>
</div>


<!-- Footer
================================================== -->
<div id="footer">
	
	<!-- Footer Top Section -->
	<?php include_once 'footer.php'; ?>
	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

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
  							
  					$('#gigs').append('<a '+
  					 'href="gig-detail.html?gigId='+gig.gigId+'" class="job-listing">'+

					'<!-- Job Listing Details -->'+
					'<div class="job-listing-details">'+
						'<!-- Logo -->'+
						'<div class="job-listing-company-logo">'+
							'<img src="images/user-avatar-placeholder.png" alt="">'+
						'</div>'+

					'	<!-- Details -->'+
						'<div class="job-listing-description">'+
							'<h4 class="job-listing-company">'+gig.seller.slice(29)+' <span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h4>'+
							'<h3 class="job-listing-title">'+gig.gigId+'</h3>'+
						'</div>'+
					'</div>'+

					'<!-- Job Listing Footer -->'+
					'<div class="job-listing-footer">'+
						
						'<ul>'+
							'<li><i class="icon-material-outline-location-on"></i> San Francisco</li> </br>'+
							
						'	<li><i class="icon-material-outline-account-balance-wallet"></i> $'+gig.price+'        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>'+
							'<li><i class="icon-material-outline-access-time"></i>'+gig.energy+' Kw-h</li>'+
						'</ul>'+
					'</div>'+
				'</a>');
							
						});
					
						
					},
					error: function(xhr){
						
						swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");

						}
				});*/
</script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
 
</script>



</body>
</html>