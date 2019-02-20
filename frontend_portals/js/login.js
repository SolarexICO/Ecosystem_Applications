
var url = '18.224.62.217:3000';
$(document).ready(function(){


	$('#login').on('click', function(){
		//e.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		var userType = $('input[name=account-type-radio]:checked', '#login-form').val();
		
		if( email && password ) {
			$("#login").removeClass( "button full-width button-sliding-icon ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" );
		
			if (userType== "seller") {
				$.ajax({
				type: "GET",
				url: 'http://'+url+'/api/queries/AuthenticateSeller?email='+email+'&password='+password+'',
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				data: '',
				success: function (data) {
					console.log(data);
					//console.log(data[0].password);
					if (data.length>0) {
						if(password == data[0].password){
					
							$.post( "login_session.php", {email: data[0].email, name: data[0].name , userPic: data[0].image , userType: userType})
                			.done(function( d ) {
				             });


						$("#login-form").trigger('reset');
						$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
					
						Snackbar.show({
							text: 'Logged In as '+data[0].name+'!',
							pos: 'bottom-center',
							showAction: false,
							actionText: "Dismiss",
							duration: 2000,
							textColor: '#fff',
							backgroundColor: '#383838'
							}); 
							 					
						setTimeout(function(){window.location.replace('dashboard-seller.php'); }, 2000);

						}
						
					
					}
					else{
							$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
		
							swal("Error!", "User Credentials Invalid", "error");
						}
				},
				error: function(xhr){

					$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
					swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");
				}
			});
			}
			else if(userType=="buyer"){
				$.ajax({
				type: "GET",
				url: 'http://'+url+'/api/queries/AuthenticateBuyer?email='+email+'&password='+password+'',
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				data: '',
				success: function (data) {
					console.log(data);
					//console.log(data[0].password);
					if (data.length>0) {
						if(password == data[0].password){
					
							$.post( "login_session.php", {email: data[0].email, name: data[0].name, userPic: data[0].image , userType: userType })
                			.done(function( d ) {
				             });


						$("#login-form").trigger('reset');
						$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
					
						Snackbar.show({
							text: 'Logged In as '+data[0].name+'!',
							pos: 'bottom-center',
							showAction: false,
							actionText: "Dismiss",
							duration: 2000,
							textColor: '#fff',
							backgroundColor: '#383838'
							}); 
							 					
						setTimeout(function(){window.location.replace('dashboard-buyer.php'); }, 2000);

						}
						
					
					}
					else{
							$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
		
							swal("Error!", "User Credentials Invalid", "error");
						}
				},
				error: function(xhr){

					$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
					swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");
				}
			});
			}
		}
		else{
			$("#login").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-10" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-10" );
			swal("Empty Fields!", "Kindly Fill all the required fields", "info");
			//$('#invalid_form').hide();
		}
	})
});