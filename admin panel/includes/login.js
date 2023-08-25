$('document').ready(function() {
	$("#login_form").validate({
		rules: {
			password: {
				required: true,
				minlength: 5,
				maxlength: 30
			},
			email: {
				required: true,
				email: false,
				minlength: 3,
				maxlength: 35
			},
		},
		messages: {
			password:{
			  required: "Please enter your password!",
			  minlength: "*Password can be at least 6 characters long!",
			  maxlength: "*Password max 30 characters allowed!"
			 },
			email:{
			required: "Please enter a valid email address!",
			minlength: "*Email address can be at least 7 characters long!",
			maxlength: "*Email address max 35 characters allowed!"
			},
		},
		submitHandler: submitLoginForm	
	});	
	
	function submitLoginForm() {
		var data = $("#login_form").serializeArray();	
		data[0].value = window.btoa(data[0].value);
		data[1].value = window.btoa(data[1].value);
		
		$.ajax({				
			type : 'POST',
			url  : 'login.php',
            dataType: 'JSON',
			data : data,
			beforeSend: function(){	
				$("#error_login").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Loading...');
				//setTimeout(function(){location.reload(1);},10000);
			},
			success : function(response){
				console.log(response.status);
				if(response.status === "success"){									
					$("#login_button").html('<img width="25px" src="./includes/loading.gif" /> &nbsp; Logging in...');
					setTimeout('window.location.reload(true); ',1000);
				} else {									
					$("#error_login").fadeIn(1000, function(){						
						$("#error_login").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>&nbsp;'+response.message+'</div>');
						$('#password').val('');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span>&nbsp; Log in');
					});
				}
			}
		});
		
		return false;
	}   
	
	
	
});