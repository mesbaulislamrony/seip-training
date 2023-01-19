<?php
session_start();
include_once('header.php');
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
}session_unset();
?>
<div class="page-header">
	<h2>Add Hobbys</h2>
</div>
<form class="form-horizontal" action="store.php" method="POST">
	<div class="form-group">
		<div class="col-sm-10">
			<div class="checkbox">
				<label><input type="checkbox" name="hobby[]" value="Cricket"> Cricket</label>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="hobby[]" value="Football"> Football</label>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="hobby[]" value="Pool"> Pool</label>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="hobby[]" value="Hocky"> Hocky</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12">
			<input type="submit" class="btn btn-success form-control" value="Save">
		</div>
	</div>
</form>
<?php include_once('footer.php'); ?>
