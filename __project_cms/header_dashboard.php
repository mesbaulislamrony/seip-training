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
?>
<!DOCTYPE html>
<html>
<head>
	<title>OWN-CMS</title>
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
    <script src="<?php echo basepath()?>/js/tinymce/tinymce.dev.js"></script>
</head>
<body class="backend">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        	<a class="navbar-brand" href="dashboard.php"><i class="fa fa-adn">&nbsp;</i></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><i class="fa fa-home">&nbsp;</i>mxcms<span class="sr-only">(current)</span></a></li>
                <li><a href="newpost.php"><i class="fa fa-plus">&nbsp;</i>New</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javaScript:;">How's it going, <?php echo $_SESSION['username']; ?></a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user">&nbsp;</i><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javaScript:;"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="setting_profile.php">Edit my profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>