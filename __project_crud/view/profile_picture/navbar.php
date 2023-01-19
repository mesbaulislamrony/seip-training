<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Profile Picture</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="thumbnail.php" title="View thumbnail"><span class="glyphicon glyphicon-th"></span></a></li>
			</ul>
		</div>
	</div>
</nav>
<?php if(isset($_SESSION['message'])){ ?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>