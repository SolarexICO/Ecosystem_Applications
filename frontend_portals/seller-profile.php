<?php 
session_start();
if (!isset($_SESSION["email"])) {

	header("location:login.php");
}

$ch = curl_init();
$gigs=' ';
curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Seller/".$_POST['uId']."");
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
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header">
		<?php  
			$pageTop=2; include_once 'header.php';
		 ?>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="single-page-header freelancer-header" data-background-image="images/single-freelancer.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image freelancer-avatar"><img src="<?php echo $res[0]["image"]; ?>" alt=""></div>
						<div class="header-details">
							<h3><?php echo $res[0]["name"]; ?> <span><?php echo $res[0]["email"]; ?></span></h3>
							<ul>
								<li><div class="star-rating" data-rating="5.0"></div></li>
								<li><img class="flag" src="images/flags/de.svg" alt=""> Germany</li>
								<li><div class="verified-badge-with-title">Verified</div></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">
			
			<!-- Page Content -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">About Me</h3>
				<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>

				<p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
			</div>

			<!-- Boxed List -->
			
			<!-- Boxed List / End -->
			
			<!-- Boxed List -->
			
			<!-- Boxed List / End -->

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">
				
			

				<!-- Button -->
				

				<!-- Freelancer Indicators -->
				<div class="sidebar-widget">
					
				
				<!-- Widget -->
			

				<!-- Widget -->
				<div class="sidebar-widget">
					<div class="bidding-widget">
						<div class="bidding-headline"><h3>Custom Offer!</h3></div>
						<div class="bidding-inner">

							<!-- Headline -->
							<span class="bidding-detail">Set your <strong>desired rate</strong></span>

							
							<!-- Headline -->
							

							<!-- Fi<elds -->
						<form id="customOffer-form">
							

						
										<div class="content with-padding padding-bottom-10">
											</div>
										<div class="row">
											<div class="col-xl-12">
												<div class="input-with-icon">
													<input id="customPrice" class="with-border" type="text" placeholder="Price">
													<i class="currency">USD</i>
												</div>
											</div></br>
											</div>
											<div class="content with-padding padding-bottom-10">
											</div>
											
											<div class="row">
											<div class="col-xl-12">
												<div class="input-with-icon">
													<input id="customEnergy" class="with-border" type="text" placeholder="Energy">
													<i class="currency">Kw-h</i>
												</div>
											</div>
										</div>
										
									
										</form>
							<!-- Button -->
							<button id="customOffer" class="button ripple-effect move-on-hover full-width margin-top-30"><span>Place Offer</span></button>

						</div>
						
					</div>
				</div>


				<!-- Sidebar Widget -->
				
				</div>

			</div>
		</div>

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->

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


<!-- Make an Offer Popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Make an Offer</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Discuss your project with David</h3>
				</div>
					
				<!-- Form -->
				<form method="post">

					<div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="First and Last Name"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="emailaddress" id="emailaddress" placeholder="Email Address"/>
					</div>

					<textarea name="textarea" cols="10" placeholder="Message" class="with-border"></textarea>

					<div class="uploadButton margin-top-25">
						<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
						<label class="uploadButton-button ripple-effect" for="upload">Add Attachments</label>
						<span class="uploadButton-file-name">Allowed file types: zip, pdf, png, jpg <br> Max. files size: 50 MB.</span>
					</div>

				</form>
				
				<!-- Button -->
				<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">Make an Offer <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>
			<!-- Login -->
			<div class="popup-tab-content" id="loginn">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Discuss Your Project With Tom</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="make-an-offer-form">

					<div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border" name="name2" id="name2" placeholder="First and Last Name" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="emailaddress2" id="emailaddress2" placeholder="Email Address" required/>
					</div>

					<textarea name="textarea" cols="10" placeholder="Message" class="with-border"></textarea>

					<div class="uploadButton margin-top-25">
						<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload-cv" multiple/>
						<label class="uploadButton-button" for="upload-cv">Add Attachments</label>
						<span class="uploadButton-file-name">Allowed file types: zip, pdf, png, jpg <br> Max. files size: 50 MB.</span>
					</div>

				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="make-an-offer-form">Make an Offer <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Make an Offer Popup / End -->



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


		var url = '18.224.62.217:3000';
$('#customOffer').on('click', function(){

		
		var customEnergy=$('#customEnergy').val();
		var customPrice=$('#customPrice').val();
		var customContractId="contract"+Date.now();
		var seller="<?php echo $res[0]['email']; ?>";
		var buyer="<?php echo $_SESSION['email']; ?>";
			
		
		//alert(customPrice);
		//alert(customEnergy);



		if (!customPrice || !customEnergy) {
			swal("Error!", "Kindly Fill all the info", "error");
					
		}

		else{
			$("#customOffer").removeClass( "button full-width button-sliding-icon ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" );
		
			
				$.ajax({
					type: "POST",
					url: 'http://'+url+'/api/org.solar.ex.Contract',
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					data: '{"$class": "org.solar.ex.Contract", "contractId": "'+customContractId+'" ,"energy": '+customEnergy+', "price": '+customPrice+' , "contractState": "SELLER_REQUESTED" , "buyer": "resource:org.solar.ex.Buyer#'+buyer+'" , "seller": "resource:org.solar.ex.Seller#'+seller+'"}',
					success: function (data) {
						
						//swal("Gig Posted","Gig posting successfull!", "success")
						$("#customOffer").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-30" );
						$("#customOffer-form").trigger('reset');
						Snackbar.show({
							text: 'Custom Offer Submitted Successfully!!',
							pos: 'bottom-center',
							showAction: true,
							actionText: "Dismiss",
							duration: 4000,
							textColor: '#fff',
							backgroundColor: '#383838'
						});
							//window.location.replace('pages-login.html'); 
					
						
					},
					error: function(xhr){
						$("#customOffer").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-30" );
						swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");

						}
				});
			
			
		}
				
	});
</script>

</body>
</html>