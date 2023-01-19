<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\city\city;

$obj = new City();
$obj->prepare($_GET);
$value = $obj->single();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Update city name</h2>
	</div>
	<form action="update.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
		<div class="form-group">
			<label for="">Change city name</label>
			<input type="text" class="form-control" name="title" value="<?php echo $value['title']; ?>">
		</div>
		<button type="submit" class="btn btn-info">Update</button>
	</form>
</div>