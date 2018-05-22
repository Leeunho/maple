<!DOCTYPE html>
<html lang="ko">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title><?=$this->title?></title>
	<meta name="title" content="<?=$this->title?>">
	<meta name="description" content="<?=$this->description?>">
	<meta name="keywords" content="<?=$this->keywords?>">
	<meta property="og:title" content="<?=$this->title?>">
	<meta property="og:description" content="<?=$this->description?>">
	<meta property="og:site_name" content="maple.unoup.co.kr">
	<meta property="og:type" content="website">
	<link rel="shortcut icon" href="<?=$this->assets('images/logo.png')?>">
	<link rel="stylesheet" href="<?=$this->assets('css/nova.css')?>">
	<link rel="stylesheet" href="<?=$this->assets('css/style.css')?>">
	<link rel="stylesheet" href="<?=$this->assets('css/main.css')?>">
	<link rel="stylesheet" href="<?=$this->assets('css/item.css')?>">
	<link rel="stylesheet" href="<?=$this->assets('fontawesome/css/fontawesome-all.css')?>">
	<script type="text/javascript" src="<?=$this->assets('jquery/jquery-3.3.1.min.js')?>"></script>
</head>
<body>

	<!-- header -->
	<header class="header">
		<div id="guide-button">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div id="logo">
			<a href="/">
				<div class="img">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="36" height="36" viewBox="0 0 36 36">
						<defs>
							<linearGradient id="linear-gradient" x1="18" y1="36" x2="18" gradientUnits="userSpaceOnUse">
							  <stop offset="0" stop-color="#ff794c"></stop>
							  <stop offset="1" stop-color="#fea24d"></stop>
							</linearGradient>
						</defs>
						<circle class="logo-bg" cx="18" cy="18" r="18"></circle>
						<text id="U" class="logo-text" x="11.5" y="24.963">U</text>
					</svg>
				</div>
				<span>
					UnoUp
				</span>
			</a>
		</div>
		<div class="show-icon">
			<i class="fa fa-search"></i>	
		</div>
		<div class="hide-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<form method="get" action='/search' class="search-wrapper">
			<button type="submit" class="search-icon">
				<i class="fa fa-search"></i>
			</button>
			<input type="text" name="username" value="<?=isset($_GET['username']) ? $this->p($_GET['username']) : ''?>">
		</form>
	</header>
	<!-- //header -->

	<!-- navigation -->
	<nav>
		<div class="container">
			<ul>
				<?php if ( $_SERVER['REQUEST_URI'] == '/' ){?>
					<li class="active"><a href="/">홈</a></li>
				<?php }else{?>
					<li><a href="/">홈</a></li>
				<?php }?>
				<?php if ( strpos($_SERVER['REQUEST_URI'], '/dojang') > -1 ){?>
					<li class="active"><a href="/dojang">무릉도장</a></li>
				<?php }else{?>
					<li><a href="/dojang">무릉도장</a></li>
				<?php }?>
			</ul>
		</div>
	</nav>
	<!-- //navigation -->

	<style type="text/css">
		.header {border-bottom: none;}
		nav {
			position: fixed; top: 64px;
			width: 100%; height: 40px;
			/*background: rgba(255, 121, 76, 0.75);*/
			background: #fe9a78;
			z-index: 1001;
		}

		nav .container {padding: 0;}

		nav ul {padding: 0 15px;}

		nav ul li {display: inline-block; color: #fff; margin-right: 10px; font-size: 15px;}
		nav ul li.active a {border-bottom-color: #fff;}
		nav ul li a {display: inline-block; height: 40px; padding: 11px 13px 7px; border-bottom: 3px solid transparent; font-family: Nanum Gothic;}
	</style>