<?php
session_start();
include_once('../../header.php');
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Add new city</h2>
	</div>
	<form action="store.php" method="POST">
		<div class="form-group">
		<label for="">New city name</label>
			<input type="text" class="form-control" name="title" placeholder="New city name">
		</div>
		<button type="submit" class="btn btn-success">Save</button>
	</form>
</div>
