<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Subscription\Subscription;
$obj = new Subscription();
$values = $obj->index();
if (isset($_SESSION['massage'])) {
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php
}session_unset();
?>
<div class="page-header">
	<h2>Subscribers list</h2>
</div>
<ul class="list-group">
	<?php
	if( sizeof($values) != 0 ){
		foreach ($values as $value) {
	?>
	<li class="list-group-item">
		<?php echo $value['subscriber_name']; ?>
		<span class="pull-right">
			<a href="show.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-eye-open">&nbsp;</i></a>
			<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
			<a href="trash.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
		</span>
	</li>
	<?php
		}
	}else{
	?>
	<li class="list-group-item">No subscriber here.</li>
	<?php
	}
	?>
</ul>
<?php include_once('footer.php'); ?>
