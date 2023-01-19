<?php
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$modelObj = new Mobile();
$data = $modelObj->prepare($_GET)->show();
?>
<?php include_once('../../header.php') ?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header"><h2>Change Mobile Models</h2></div>
	<form action="update.php" method="post">
		<div class="form-group">
			<label for="title">Change Your mobile model</label>
			<input type="hidden" name="id" value="<?php echo $data->id; ?>">
			<input type="text" class="form-control" name="title" id="title" placeholder="Mobile model" value="<?php echo $data->title; ?>">
		</div>
		<input type="submit" class="btn btn-default" value="Update">
	</form>
</div>