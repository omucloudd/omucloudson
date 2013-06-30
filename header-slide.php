<!DOCTYPE html>

	<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	
	<title>Omü Cloud - Dosya Paylaşım Platformu</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/flexslider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/prettyPhoto.css" />
	<!-- / Stylesheets -->

	<!-- Javascripts -->
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/hoverIntent.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/sys_custom.js"></script>
	<!-- / Javascripts -->		


	<!-- CSS & Script for for Responsive Layouts -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/responsive.css" />
	<script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!-- / CSS & Script for for Responsive Layouts -->

	<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->

<body>

	<div id="boxed" class="fullwidth">
		<div id="wrapper">

			<header id="header">

				
				<!-- /- .topbar -->

				<div id="head">

					<div class="logo">
						<a href="index.php"><img src="images/logo.png"></a>
					</div>
					<!-- /- .logo -->

					<nav>
						<div class="menu">
							<ul class="sf-menu">
								
								<li><a href="index.php">Ana Sayfa<span>Omü-Cloud</span></a></li>
								<li><a href="ozellikler.php">Özellikler<span>Neler mevcut?</span></a></li>
								<li><a href="indir.php">İndir<span>Kolay kullanım</span></a></li>
								<li><a href="u_cihazlar.php">Uyumlu cihazlar<span>Pc-Mobile-Tablet</span></a></li>
								<li><a href="yardim.php">Blog<span>Sorularınız</span></a></li>
						
							</ul>
						</div>
						<!-- /- .menu -->
					</nav>

				</div>
				<!-- /- #head -->	
			</header>
			<!-- /- <header> -->
			<?php
// Kullanıcı girişi yapılmadıysa giriş formunu göster
			if (logged_in() === true) { 
				include 'user_control.php';
				
			}else {
				include 'log_res_form.php';
			}
			?>
			
			
			
			<div class="clear"></div>
			
			<div id="featured_slider">
				<div class="slider_wrapper">

				<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
				<script type="text/javascript" charset="utf-8">
					$(window).load(function() {
						jQuery('.flexslider').flexslider();
					});
				</script>
				<!-- /- <script> -->

					<div class="flexslider">
						<ul class="slides">

							<li>
								<a href="#"><img src="images/demo/slide01.png"  /></a>
							</li>
							<!-- / slide item -->
							<li>
								<img src="images/demo/slide02.png"  />
							</li>
							<!-- / slide item -->
							<li>
								<img src="images/demo/slide03.png"  />
							</li>
							<!-- / slide item -->
							
						
						</ul>
					</div>
					<!-- /- .flexslider -->

				</div>
				<!-- /- .slider_wrapper -->
			</div>
			<!-- /- #featured_slider -->
			
			<div class="pagemid">
				<div class="maincontent">

					<div id="main">