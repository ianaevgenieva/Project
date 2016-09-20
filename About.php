<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>About</title>
<link  rel= "stylesheet" type = "text/css"  href = "assets/css/reset.css">
<link rel = "stylesheet" type = "text/css" href= "assets/css/about.css">
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<style>
 .error 
 {
   display:none;
    color:red;
 }
 
 #btnInfo 
 {
   margin-left:25%;
   border-radius:50%;
 }
 
 .information
 {
  margin-left:10px;
 }
 
 #pic
 {
   margin:20px 20px;
 }
 #add 
 {
  margin:10px 20px;
  }
  
   #allPicture
	 {
	   width:850px;
	   
	   border:2px solid #FFC0CB;
	   float:right;
	   margin-top:20px;
	   margin-right:100px;
	   border-radius:10%;
	   display:inline-block;
	   
	 } 
   .box 
   {
    margin:20px 20px;
    width:155px;
    height:155px;
    border-radius:10px;
   }
</style>
</head>

<body>
<section class = "pic">
		 <div class = "field">
		   <div id="names">
		   <header>About</header>
		   </div>
		    <img src ="assets/images/logo.jpg" id="logo">
		   <div id="link">
			   <a href="homeUser.html" >Home</a>
			   <a href= "user.html">Users</a>
			   <a href="#">About</a>
			   <a href = "logout.php">Logout</a>
			  
		   </div>
		 </div>
		 <div id=forms>
		
			<div id="addAnimals">
			  <div id = "places"><header>Add animals:</header></div>
			  
			  
			  
				 <form name="form" action="upload.php" method="POST" enctype="multipart/form-data">
    				<input type="file" name="foto">
    				<p>
    				<button>add</button>
				 </form>
			 </div>
		 </div>
		 <div id="allPicture">
		  
		    
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
	$.get("getUserInfo.php", function(data){
         div =$("#allPicture");
         for(picture in data["pictures"]){
             addImages((data["pictures"][picture][0]));
         }      
    }, "json");

	function addImages(imageSRC)
	{
		div.append("<img class=box src="+imageSRC+" />");
	} 
});
</script>
</html>