<?php
session_start();
include_once('../../header.php');
?>


<div class="container">
	<?php include_once('navbar.php'); ?>
	<div class="page-header"><h2>Add New Book</h2></div>
	<form action="store.php" method="post">
	<div class="form-group">
	    <label for="title">Your favorite book</label>
	    <input type="text" class="form-control" name="title" id="title" placeholder="Book title">
	</div>
	<input type="submit" class="btn btn-success" value="Save and Continue">
	</form>
</div>

