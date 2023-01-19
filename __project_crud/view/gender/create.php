<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\gender\gender;

$obj = new gender();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Add new user</h2>
	</div>
	<form action="store.php" method="POST">
		<div class="form-group">
			<label for="">New user name</label>
			<input type="text" class="form-control" name="title" placeholder="New user name">
		</div>
		<div class="radio">
			<label><input type="radio" name="sex" id="" value="male">Male</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="sex" id="" value="female">Female</label>
		</div>
		<button type="submit" class="btn btn-success">Add User</button>
	</form>
</div>
