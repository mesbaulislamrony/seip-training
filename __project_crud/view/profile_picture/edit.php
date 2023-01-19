<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\profile_picture\profile;

$obj = new profile();
$obj->prepare($_GET);
$value = $obj->getsingle();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Update profile picture</h2>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<div class="propic">
				<img src="images/<?php echo $value['profile_image']; ?>" alt="" class="img-responsive img-thumbnail">
			</div>
		</div>
		<div class="col-sm-8">
			<form action="update.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
				<div class="form-group">
					<label for="file">Browse profile picture</label>
					<input type="file" id="file" name="image">
					<p class="help-block">Add new profile picture.</p>
				</div>
				<button type="submit" class="btn btn-success">Update</button>
			</form>
		</div>
	</div>

</div>
