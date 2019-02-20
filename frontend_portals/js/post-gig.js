var url = '18.224.62.217:3000';
$(document).ready(function(){
	if(!$.session.get('login')){
		$.session.set('login', 'true');
		//window.location.replace('pages-login.html');			
		
	}
	else{
		
	//	window.location.replace('pages-login.html');
	}
	

	$('#postGig').on('click', function(){

		var gigTitle = $('#gigTitle').val();
		var location = $('#location').val();
		var price = $('#price').val();
		var energy = $('#energy').val();
		var description = $('#description').val();
		var seller = $('#seller').val();
			
		
	
		console.log(gigTitle+location+price+energy+description);

		if (!gigTitle || !location || !price || !energy || !description) {
			swal("Error!", "Kindly Fill all the info", "error");
					
		}

		else{
			$("#postGig").removeClass( "button full-width button-sliding-icon ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" );
		
			
				$.ajax({
					type: "POST",
					url: 'http://'+url+'/api/org.solar.ex.Gig',
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					data: '{"$class": "org.solar.ex.Gig", "gigId": "gig'+Date.now()+'" ,"energy": '+energy+', "price": '+price+' , "title": "'+gigTitle+'"  , "description": "'+description+'" , "seller": "resource:org.solar.ex.Seller#'+seller+'"}',
					success: function (data) {
						
						//swal("Gig Posted","Gig posting successfull!", "success")
						$("#postGig").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-30" );
						$("#postGig-form").trigger('reset');
						Snackbar.show({
							text: 'Gig posted successfully!!',
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
						$("#postGig").removeClass( "button full-width button-sliding-iconL ripple-effect margin-top-30" ).addClass( "button full-width button-sliding-icon ripple-effect margin-top-30" );
						swal("Something Went Wrong!", "Can't Connect to Blockchain", "error");

						}
				});
			
			
		}
				
	});
});
