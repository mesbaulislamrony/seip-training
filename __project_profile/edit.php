<?php
include_once('header.php');
include_once('vendor/autoload.php');
use profile\profile;

$obj = new profile();
$obj->prepare($_GET);
$value = $obj->getsingle();
?>
<div class="alert alert-success" role="alert">
</div>
<div class="page-header">
	<h2>Update profile picture</h2>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="propic">
			<img src="images/<?php echo $value['profile_photo']; ?>" alt="" class="img-responsive img-thumbnail">
		</div>
	</div>
	<div class="col-sm-8">
		<form action="update.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
			<div class="form-group">
				<label>Update user name</label>
				<input type="text" name="profile_name" class="form-control" value="<?php echo $value['user_name']; ?>">
			</div>
			<div class="form-group">
				<label for="file">Browse profile picture</label>
				<input type="file" id="file" name="image">
				<p class="help-block">Add new profile picture.</p>
			</div>
			<button type="submit" class="btn btn-success">Update</button>
		</form>
	</div>
</div>
