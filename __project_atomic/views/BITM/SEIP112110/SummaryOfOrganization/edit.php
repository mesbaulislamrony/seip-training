<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\SummaryOfOrganization\Summary;

$obj = new Summary();
$obj->getID($_GET);
$value = $obj->show();
if (isset($_SESSION['massage'])) {
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php
}session_unset();
?>
<div class="page-header">
	<h2>Update Summary</h2>
</div>
<form action="update.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
	<div class="form-group">
		<label for="">Change Summary Title</label>
		<input type="text" class="form-control" name="title" placeholder="Summary Title" value="<?php echo $value['title']; ?>">
	</div>
	<div class="form-group">
		<label for="">Change Summary</label>
		<textarea class="form-control" rows="6" name="summary" placeholder="Write summary here"><?php echo $value['summary']; ?></textarea>
	</div>
	<button type="submit" class="btn btn-success">Save</button>
</form>
<?php include_once('footer.php'); ?>
