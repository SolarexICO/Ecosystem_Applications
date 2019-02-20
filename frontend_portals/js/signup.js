var url = '18.224.62.217:3000';
$(document).ready(function(){
	if(!$.session.get('login')){
		$.session.set('login', 'true');
		//window.location.replace('pages-login.html');			
		
	}
	else{
		
	//	window.location.replace('pages-login.html');
	}
	

	$('#register-account-form').on('submit',  function(event){
		event.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		var confirmPassword = $('#confirmPassword').val();
		var name = $('#name').val();	
		
		var userType = $('input[name=account-type-radio]:checked', '#register-account-form').val();
		//console.log(userType);

		if (!email || !password || !name || !confirmPassword || !ind_img) {
			swal("Error!", "Kindly Fill all the info", "error");
					
		}
		else if (password != confirmPassword) {
			swal("Error!", "Password doesnot match Repeat Password", "info");
					
		}

		else{
			$("#register").removeClass( "button full-width button-sliding-icon ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" );
		
		$.ajax({
         		url: "add-pic.php",
   				type: "POST",
   				data:  new FormData(this),
   				contentType: false,
         		cache: false,
   				processData:false,
   			})
		.done(function( dd ) {
			//var d = JSON.stringify(data);

			var pData=JSON.parse(dd);
			//alert(pData["data"][0]["img"]);
			//alert(d);
			console.log(pData);
			profileImg   = pData["data"][0]["img"].replace(new RegExp("\\\\", "g"), "");
			console.log(profileImg);
			if(userType == "seller"){
				$.ajax({
					type: "POST",
					url: 'http://'+url+'/api/org.solar.ex.Seller',
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					data: '{"$class": "org.solar.ex.Seller", "tokens": 500,"energy": 0, "energySold": 0, "email": "'+email+'", "name": "'+name+'", "password": "'+password+'", "image": "'+profileImg+'"}',
					success: function (data) {
						
						swal("SignUp","Seller registration successfull!", "success")
						.then((value) => {
							window.location.replace('login.php'); 
						});
						
					},
					error: function(xhr){
						$("#register").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
						swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");

						}
				});
			}
			else if(userType == "buyer"){
				$.ajax({
					type: "POST",
					url: 'http://'+url+'/api/org.solar.ex.Buyer',
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					data: '{"$class": "org.solar.ex.Buyer", "tokens": 500,"energy": 0, "energyConsumed": 0, "email": "'+email+'", "name": "'+name+'", "password": "'+password+'", "image": "'+profileImg+'"}',
					success: function (data) {
						
						swal("SignUp","Buyer registration successfull!", "success")
						.then((value) => {
							window.location.replace('login.php'); 
						});
						
					},
					error: function(xhr){
						$("#register").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
						swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");

						}
				})
			}
		});
		}
				
	});
});
