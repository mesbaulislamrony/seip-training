<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\gender\gender;

$obj = new gender();
$obj->prepare($_GET);
$value = $obj->single();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Change user name and gender</h2>
	</div>
	<form action="update.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
		<div class="form-group">
			<label for="">Change user name</label>
			<input type="text" class="form-control" name="title" value="<?php echo $value['title']; ?>">
		</div>
		<div class="radio">
			<label><input type="radio" name="sex" id="" value="male" <?php if(in_array("male",$value)){ echo "checked"; }?>>Male</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="sex" id="" value="female" <?php if(in_array("female",$value)){ echo "checked"; }?>>Female</label>
		</div>
		<button type="submit" class="btn btn-success">Save</button>
	</form>
</div>
