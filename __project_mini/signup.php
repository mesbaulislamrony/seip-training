<?php
if(!isset($_SESSION)){ session_start(); }
include_once('header.php');
?>
<section class="login-page">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Create an account</h3>
			</div>
			<div class="panel-body">
				<form action="view/c_signup.php" method="POST">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Sign up</button>
				<?php if(isset($_SESSION['message'])) { ?>
				<p class="pull-right"><?php echo $_SESSION['message']; ?></p>
				<?php session_unset($_SESSION['message']); } ?>
				</form>
			</div>
		</div>
	</div>
</section>
