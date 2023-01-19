<?php
if(!isset($_SESSION)){ session_start(); }
include_once('vendor/autoload.php');
use owncms\owncms;
$obj = new owncms();
function basepath(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
        $dir = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
        $array = explode('/', $dir);
        $pop = array_pop($array);
        echo implode('/', $array);
    }else{
        $dir = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
        $array = explode('/', $dir);
        $pop = array_pop($array);
        echo implode('/', $array);
    }
}
$menus = $obj->menus();
?>
<!DOCTYPE html>
<html>
<head>
	<title>mx-cms</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="">
	<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo basepath()?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo basepath()?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo basepath()?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo basepath()?>/fonts/fonts.css"/>	
	<link rel="stylesheet" type="text/css" href="<?php echo basepath()?>/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo basepath()?>/css/responsive.css"/>
</head>
<body class="front-end">
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">mxcms</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if(!empty($menus)){ ?>
			<ul class="nav navbar-nav">
				<li> <a href="index.php">Home</a></li>
				<?php foreach ($menus as $key => $menu) { ?>
				<li><a href="<?php echo basepath()."/pages.php?id="; echo $menu['id']; ?>"><?php echo $menu['title']; ?></a></li>
				<?php } ?>
            	<li><a href="about.php">About</a></li>
			</ul>
			<?php } ?>
			<ul class="nav navbar-nav navbar-right">
				<?php if (!isset($_SESSION['username'])) { ?>
				<li><a href="login.php">Login</a></li>
				<?php }else{ ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="setting_profile.php">Edit profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>