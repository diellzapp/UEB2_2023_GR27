$(document).ready(function() {
	$("#login-form").submit(function(event) {
		event.preventDefault(); 

	
		var username = $("#username").val();
		var password = $("#password").val();

		// Dergimi i te dhenave PHP file duke perdorur AJAX
		$.ajax({
			type: "POST",
			url: "login.php",
			data: { username: username, password: password },
			success: function(response) {
				if(response == "success") {
					$("#message").html("Login successful!");
				} else {
					$("#message").html("Invalid username or password.");
				}
			},
			error: function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
			}
		});
	});
});
