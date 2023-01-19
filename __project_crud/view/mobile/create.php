<?php session_start(); ?>
<?php include_once('../../header.php'); ?>
<div class="container">
    <?php include_once('navbar.php'); ?>
	<div class="page-header"><h2>Add Mobile Models</h2></div>

	<form action="store.php" method="post">
		<div class="form-group">
			<label for="title">Your favorite mobile model</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Mobile model">
		</div>
		<input type="submit" class="btn btn-success" value="Save and Continue">
	</form>
</div>
<?php include_once('../../footer.php'); ?>