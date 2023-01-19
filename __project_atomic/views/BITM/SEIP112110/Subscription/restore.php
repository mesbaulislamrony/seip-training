<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Subscription\Subscription;

$obj = new Subscription();
$values = $obj->trashed();
if (isset($_SESSION['massage'])) {
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php
}session_unset();
?>
<div class="page-header">
	<h2>Trashed subscribers list</h2>
</div>
	<?php
	if (sizeof($values) != 0) {
	?>
<table class="table table-bordered table-striped">
	<tr>
		<th>Subscribers Name</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($values as $value) {
	?>
	<tr>
		<td><?php echo $value['subscriber_name']; ?></td>
		<td>
			<span class="pull-right">
				<a href="restored.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
				<a href="delete.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
			</span>
		</td>
	</tr>	
	<?php
		}
	?>
</table>
	<?php
	}else{
	?>
	<div class="alert alert-danger" role="alert">No data here.</div>
	<?php
	}
	?>
<?php include_once('footer.php'); ?>
