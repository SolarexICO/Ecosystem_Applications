<?php 

session_start();

if (!isset($_SESSION["email"])) {

	header("location:login.php");
}

$ch = curl_init();
$gigs=' ';
curl_setopt($ch, CURLOPT_URL, "http://18.224.62.217:3000/api/org.solar.ex.Gig/".$_POST['gigId']."");
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
<style>
      
      
      #color, #centered {
        padding: 1em;
        background: #fff;
        float: left;
        width: 100%;
        box-sizing: border-box;
      }
      #color .nanobar, #centered .nanobar {
        margin-bottom: 2em;
      }

      #color .nanobar .bar {
        background: #38f;
        border-radius: 4px;
        box-shadow: 0 0 10px #59d;
        height: 6px;
        margin: 0 auto;
      }
      #centered .nanobar .bar {
        background: url('images/rainbow.gif') 100%;
        height: 9px;
      }
    </style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth ">

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



<!-- Titlebar
================================================== -->
<div class="single-page-header" data-background-image="images/single-job.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><a href="single-company-profile.html"><img src="images/company-logo-03a.png" alt=""></a></div>
						<div class="header-details">
							<h3 id="gigTitle"><?php echo $res[0]['title']; ?></h3>
							<h5>About the Employer</h5>
							<ul>
								<li><a href="seller-profile.php?uId=<?php echo substr($res[0]["seller"], 29); ?>" id="seller"><i class="icon-material-outline-business"></i> <?php echo substr($res[0]["seller"], 29); ?></a></li>
								<li><div class="star-rating" data-rating="4.9"></div></li>
								<li><img class="flag" src="images/flags/gb.svg" alt=""> United Kingdom</li>
								<li><div class="verified-badge-with-title">Verified</div></li>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<div class="salary-box">
							<div class="salary-type">Gig Rate</div>
							<div class="salary-amount" id="rate"><?php echo '$ '.$res[0]['price'].' - '.$res[0]['energy'].' Kw-h'; ?></div>
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

			<div class="single-page-section">

				<h3 class="margin-bottom-25">Job Description</h3>
				<p id="description"><?php echo $res[0]['description']; ?></p>

			</div>

			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business-center"></i> Open Positions</h3>
				</div>

				<div class="listings-container compact-list-layout">
					
					<!-- Job Listing -->
					<div class="job-listing">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">Gig Details</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-location-on"></i> Berlin</li>
										<li><i class="icon-material-outline-business-center"></i> $<?php echo $res[0]['price']; ?></li>
										<li><i class="icon-material-outline-access-time"></i> <?php echo $res[0]['energy']; ?> kw-h</li>
									</ul>
								</div>
							</div>

						</div>

						
					</div>
	
				</div>

			</div>

			
		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<a id="con" href="#small-dialog" class="apply-now-button popup-with-zoom-anim">Consume Gig <i class="icon-material-outline-arrow-right-alt"></i></a>
					
				<!-- Sidebar Widget -->
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
						<div class="bidding-signup">Don't have an account? <a href="#sign-in-dialog" class="register-tab sign-in popup-with-zoom-anim">Sign Up</a></div>
					</div>
				</div>

				<!-- Sidebar Widget -->
				

			</div>
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


<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Consume Gig</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Gig Details</h3>
				</div>
					
				<!-- Form -->
				<form method="post" id="apply-now-form">

					

					<div id="notification" class="notification success closeable">
				<p>You have Consumed Sussessfully.!</p>
				<a class="close" href="#"></a>
			</div>
					
					<ul id="info" class="dashboard-task-info bid-info">
													<li><strong>$ <?php echo $res[0]['price']; ?></strong><span>Fixed Price</span></li>
													<li><strong><?php echo $res[0]['energy']; ?> Kw-h</strong><span>Energy</span></li>
					
					</ul>

					<div class="section-headline margin-top-15 margin-bottom-15">
						

					</div>
					

					<h4 id="s"> <div style="display: inline-table;">Seller</div><div style="display: inline-table; float: right;" >Buyer</div></h4>
					<div class="section-headline margin-top-15 margin-bottom-15">
						

					</div>
					
					
					<section id="centered">
        
      					</section>




				</form>
				
				<!-- Button -->
				<button id="consume" class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="button"  form="apply-now-form">Consume</button>

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
<script src="js/sweetalert.js"></script>
<script src="js/jquerysession.js"></script>
<script src="js/nanobar.js"></script>
<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
 

//$('#loadFill').attr("data-slider-value","[10,70]");
	

//$('#loadFill').attr("data-slider-value","["+a+","+b+"]");

//a++;
//b++;
//$('#loadFill').attr("data-slider-value","["+a+","+b+"]");

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

// Snackbar for "place a bid" button
$('#snackbar-place-bid').click(function() { 
	Snackbar.show({
		text: 'Your bid has been placed!',
	}); 
}); 


// Snackbar for copy to clipboard button
$('.copy-url-button').click(function() { 
	Snackbar.show({
		text: 'Copied to clipboard!',
	}); 
}); 



</script>

<script>

		var url = '18.224.62.217:3000';
		$("#s").hide();	
		$("#notification").hide();
      
      var centeredbar = new Nanobar({target: document.getElementById('centered')});
			
    //  centeredbar.go(90);
			var i = 1;                     //  set your counter to 1
//$('#bbb').attr("data-slider-value",i);
function myLoop (data) {           //  create a loop function
   setTimeout(function () {    //  call a 3s setTimeout when the loop is called
      centeredbar.go(i);
              //  your code here
      i+=5;                     //  increment the counter
      if (i < 105) {            //  if the counter < 10, call the loop function
         myLoop(data);             //  ..  again which will trigger another 
      }else{
      	
      	$("#consume").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
      	$("#s").hide();
      	$("#con").hide();
      	$("#notification").show();
      	$("#consume").hide();
      	$("#info").html('<li><input readonly="readonly" type="text" value="'+data+'" class="with-border"><span>Transaction Id</span></li>');
      }                      //  ..  setTimeout()
   }, 200)
}
	var gigId="<?php echo $res[0]["gigId"]; ?>";
	var energy=<?php echo $res[0]["energy"]; ?>;
	var price=<?php echo $res[0]["price"]; ?>;
	var contractId="gig"+Date.now();
	var seller="<?php echo substr($res[0]['seller'], 29); ?>";
$('#consume').on('click', function(){
		//alert(energy);
		//alert(price);
		//alert(seller);
		$("#s").show();

	$("#consume").removeClass( "button full-width button-sliding-icon ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" );
		
			$.post( "consume.php", { gigId: gigId, energy: energy , price: price, seller: seller , contractId: contractId })
                
            .done(function( data ) {
            	//alert(data);
            	
            	myLoop(data);
            	
            	
		
                
                });	
});
//myLoop(); 


//-------------------------------------------------------------------------------
// Custom Offer


$('#customOffer').on('click', function(){

		
		var customEnergy=$('#customEnergy').val();
		var customPrice=$('#customPrice').val();
		var customContractId="contract"+Date.now();
		var seller="<?php echo substr($res[0]['seller'], 29); ?>";
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