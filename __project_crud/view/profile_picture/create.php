<?php include_once('../../header.php'); ?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Add new profile picture</h2>
	</div>
	<form action="store.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="file">Browse profile picture</label>
			<input type="file" id="file" name="image">
			<p class="help-block">Add new profile picture.</p>
		</div>
		<button type="submit" class="btn btn-success">Add New</button>
	</form>
</div>
