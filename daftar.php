<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
include "koneksi.php";
if(!isset($_SESSION['username'],$_SESSION['password'])){
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Tab Online</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    
<!--ANALYTICS CODE-->   
    <script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29231762-1']);
	  _gaq.push(['_setDomainName', 'dzyngiri.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>


<!--Stylesheets-->
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/dzyngiri.css" rel="stylesheet" type="text/css">
<link href="fonts/pacifico/stylesheet.css" rel="stylesheet" type="text/css" />

<!--Scripts-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--Sliding icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

	<div class="heading">
    	Tab ONLINE
    </div>
    
<div id="wrapper">
	<!--Sliding icons-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END Sliding icons-->

<!--login form inputs-->
<form name="login-form" class="login-form" action="daftar_proses.php" method="post">

	<!--Header-->
    <div class="header">
    <h1>Login Form</h1>
    <span>Tab online adalah sistem pencatatan keseharian dalam hal uang dan kebutuhan anda</span>
    </div>
    <!--END header-->
	
	<!--Input fields-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" class="input username" placeholder="Username" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" placeholder="Password" />
	<!--END PASSWORD-->
	<input type="password" name="password2" class="input password" placeholder="Ulangi Password"><br>
    </div>
    <!--END Input fields-->
    
    <!--Buttons-->
    <div class="footer">
    <!--Login button--><input type="submit" name="submit" value="Register" class="button" /><!--END Login button-->
    <!--Register button--><a href="index.php"> <label type="submit" name="submit" value="Login" class="register" />Login </a><!--END Register button-->
    </div>
    <!--END Buttons-->

</form>
<!--end login form-->

</div>

<!--bg gradient--><div class="gradient"></div><!--END bg gradient-->

<!-- dzyngiri bottom bar (Only for demo) -->
    <div class="dzyngiri-bottom">
    	
        
        <span>Background image by,
        <a href="#" target="_blank">
        	<strong style="font-style:italic;">R Yosi Nurrahman</strong> 
    	</a>
        </span>
    	
        <span class="right">
    	</span>
    	<div class="clr"></div>
    </div>
<!--/ dzyngiri bottom bar -->

</body>
</html>
<?
} else{
	echo "<script language='javascript'>document.location.href='home.php'</script>";
}
?>