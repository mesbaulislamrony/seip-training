<?php if(!isset($_SESSION)){ session_start(); }?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini - Project</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<?php if(!isset($_SESSION['username'])) { ?>
					<li><a href="signup.php">Signup</a></li>
					<li><a href="login.php">Login</a></li>
					<?php }else{ ?>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Profile</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</body>
</html>