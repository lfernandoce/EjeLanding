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
			
			var taller    		= $("#taller").val();
			//alert(taller);
			var nombre  		= $("#nombre").val();
			//alert(nombre);
			var linkacceso		= $("#linkacceso").val();
			//alert(linkacceso);
			var codigoacceso	= $("#codigoacceso").val();
			//alert(codigoacceso);
			var estado			= $("#selestado").val();
			alert(estado);
			/* Para obtener el valor */
			var cod = document.getElementById("selestado").value;
			alert(cod);			
			/* Para obtener el texto */
			var combo = document.getElementById("selestado");
			var selected = combo.options[combo.selectedIndex].text;
			alert(selected);
			//var dataString = 'email='+email+'&password='+password;
	
			$.ajax({
				type:"POST",
				url:"editPst.php",
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

});