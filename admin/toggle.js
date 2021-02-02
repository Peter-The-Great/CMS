$("#showitbtn").click(function(){
    		var input = $("#password");
    		if (input.attr("type") == "password") {
    			input.attr("type", "text");
    			$("#eyes").toggleClass("fas fa-eye fa-eye-slash");
    		} else {
    			input.attr("type", "password");
    			$("#eyes").toggleClass("fas fa-eye");
			}
});