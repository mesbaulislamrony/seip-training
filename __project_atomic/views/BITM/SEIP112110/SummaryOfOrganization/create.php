<?php
include_once('header.php');
?>
<div class="page-header">
	<h2>Add new Summary</h2>
</div>
<form action="store.php" method="POST">
	<div class="form-group">
		<label for="">Summary Title</label>
		<input type="text" class="form-control" name="title" placeholder="Summary Title">
	</div>
	<div class="form-group">
		<label for="">New Summary</label>
		<textarea class="form-control" rows="3" name="summary" placeholder="Write summary here."></textarea>
	</div>
	<button type="submit" class="btn btn-success">Save</button>
</form>
<?php include_once('footer.php'); ?>
