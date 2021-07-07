$(function() {
	
	// For user Registration
	$("#regsubmit").click(function(){

		var name      = $("#name").val();
		var username  = $("#username").val();
		var password  = $("#password").val();
		var email     = $("#email").val();
		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;

		$.ajax({
			type:"POST",
			url:"getregister.php",
			data:dataString,
			success:function(data){
				$("#state").html(data);
			}
		});
		return false;
	});


		// For user Login
	$("#loginsubmit").click(function(){			
		var email     = $("#email").val();
		var password  = $("#password").val();
		var dataString = 'email='+email+'&password='+password;

		$.ajax({
			type:"POST",
			url:"getlogin.php",
			data:dataString,
			success:function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					setTimeout(function(){
					$(".empty").fadeOut();
					},4000);
				}else if($.trim(data) == "disable") {
					$(".disable").show();
					setTimeout(function(){
					$(".disable").fadeOut();
					},4000);
					
				}else if($.trim(data) == "error"){
					$(".error").show();
					setTimeout(function(){
					$(".error").fadeOut();
					},4000);
				}else{
					//window.location = "exam.php";
					window.location = "Principal.php";
				}
			}
		});
		return false;
	});


		// For taller update
		$("#tallerupdate2").click(function(){
			alert("veamos");
			var input = document.getElementById("image"),
				formdata = false;			
			if (window.FormData) {
				formdata = new FormData();				
		  	}	
			var file;
			if (formdata) {				
				file = input.files[0];				
				formdata.append("image[]", file);
			}
			if(file==null)
			{				
				alert("Oops! Validation failed!");
      			returnToPreviousPage();      			
				return false;
			}
			alert("continua!");
			//var dataString = $('#formulario').serialize();			
		});

});




$(document).on('ready',function(){       
    $('#tallerupdate2').click(function(){
		alert("pausa");
        var url = "editPst.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#formulario").serialize(), 
           success: function(data)             
           {
             $('#response').html(data); 
			 alert(data);              
           }
       });
    });
});
