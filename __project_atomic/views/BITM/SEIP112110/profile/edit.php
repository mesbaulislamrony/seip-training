<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\profile\profile;
$obj = new profile();
$obj->prepare($_GET);
$value = $obj->single();
?>
<div class="page-header">
	<h2>Update Profile</h2>
</div>
<div class="row profile">
	<div class="col-sm-4">
		<img src="images/<?php echo $value['profile_photo']; ?>" alt="" class="img-responsive img-thumbnail">
	</div>
	<div class="col-sm-8">
		<form action="update.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
			<div class="form-group">
				<label for="username">User name</label>
				<input type="text" class="form-control" id="username" name="user_name" value="<?php echo $value['user_name']; ?>">
			</div>
			<div class="form-group">
				<label for="file">Browse profile picture</label>
				<input type="file" id="file" name="image">
			</div>
			<button type="submit" class="btn btn-success">Update</button>
		</form>
	</div>
</div>