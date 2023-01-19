<?php
session_start();
include_once('header.php');
if (isset($_SESSION['message'])) {
?>
<div class="alert alert-success" role="alert">
	<?php echo $_SESSION['message']; session_unset(); ?>
</div>
<?php } ?>
<div class="page-header">
	<h2>Add profile</h2>
</div>
<div class="row">
	<div class="container-fluid">		
		<form action="store.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="username">User name</label>
				<input type="text" class="form-control" id="username" name="user_name" placeholder="User Name">
			</div>
			<div class="form-group">
				<label for="file">Browse profile picture</label>
				<input type="file" id="file" name="image">
			</div>
			<button type="submit" class="btn btn-success">Add New</button>
		</form>
	</div>
</div>