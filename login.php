<?php
session_start();
$is_login = true;
if(!empty($_SESSION)){
if($_SESSION["errorLogin"]== 1){
	$is_login = false;
	$_SESSION["errorLogin"]=0;
}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login</title>
<link  rel= "stylesheet" type = "text/css"  href = "assets/css/reset.css">
<link rel = "stylesheet" type = "text/css" href= "assets/css/Login.css">
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<section class = "pic">
		 <div class = "field">
		   <div id="names">
		   		<header>Login</header>		
		   </div>
		   <img src ="assets/images/logo.jpg" id="logo">
		   <div id="link">
		   <a href="firstPage.html">Home</a>
		   <a href="#">Login</a>
		   <a href="registration.html">Registration</a>
		   </div>
		 </div>
		 <div id="formLogin">
		  <div id = "place"><header>Login</header></div>
		  <form action="loginLogic.php " method=post>
			  <label class="lb">Input User name:</label><br><br>
			  <input type="text" name="username" id= "username"><br><br>
			  <label class = "lb">Input password:</label><br><br>
			  <input type="password" name="pass" id= "pass"><br>
			  <input type="submit" value="Welcome !" id ="btnLogin"><br>
		 </form>
		 <?php if(!$is_login): ?>
			  <p style="color:red;">Incorrect user or password</p>
			  <?php endif;?>
		 </div>
		
	</section>
</body>
<script>

$(function() {
	$(".field").focusin(function(){
		$(this).css("opacity","0.8");
	});
	
	$(".field").focusout(function(){
		$(this).css("opacity","0.2");
	});
   $("form").submit(function(e){
		var username = $("#username").val();
		var pass = $("#pass").val();
		
		if (username.length < 5) {
		e.preventDefault();
		}

		if (pass.length < 5) {
			e.preventDefault();
		}
   });
});
</script>
</html>
