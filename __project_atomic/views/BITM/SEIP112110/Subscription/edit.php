<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Subscription\Subscription;

$obj = new Subscription();
$obj->getID($_GET);
$value = $obj->show();
if (isset($_SESSION['massage'])) {
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php
}session_unset();
?>
<div class="page-header">
	<h2>Update city name</h2>
</div>
<form action="update.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
	<div class="form-group">
		<label for="">Subscriber name</label>
		<input type="text" class="form-control" name="subscriber_name" value="<?php echo $value['subscriber_name']; ?>">
	</div>
	<div class="form-group">
		<label for="">Subscriber email</label>
		<input type="text" class="form-control" name="subscriber_email" value="<?php echo $value['subscriber_email']; ?>">
	</div>
	<button type="submit" class="btn btn-success">Update</button>
</form>
<?php include_once('footer.php'); ?>
