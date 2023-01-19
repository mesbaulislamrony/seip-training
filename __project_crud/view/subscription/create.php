<?php include_once('../../header.php') ?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Add new Subscriber</h2>
	</div>
	<form action="store.php" method="POST">
		<div class="form-group">
			<label for="">Subscriber name</label>
			<input type="text" class="form-control" name="subscriber_name" placeholder="Subscriber name">
		</div>
		<div class="form-group">
			<label for="">Subscriber email</label>
			<input type="text" class="form-control" name="subscriber_email" placeholder="Subscriber email">
		</div>
		<button type="submit" class="btn btn-success">Save</button>
	</form>
</div>

