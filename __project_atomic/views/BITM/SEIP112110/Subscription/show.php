<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Subscription\Subscription;

$obj = new Subscription();
$obj->getID($_GET);
$value = $obj->show();
?>
<div class="page-header">
	<h2>Subscribers Name</h2>
</div>
<table class="table table-bordered table-striped">
	<tr>
		<th>Subscribers Name</th>
		<th>Action</th>
	</tr>
	<tr>
		<td>
		<p><strong><?php echo $value['subscriber_name']; ?></strong></p>
		<em><strong><?php echo $value['subscriber_email']; ?></strong></em>
		<p>Created at : <?php echo $value['created_at']; ?></p>
		<p>Modified at : <?php echo $value['updated_at']; ?></p>
		</td>
		<td>
			<span class="pull-right">
				<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
				<a href="trash.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
			</span>
		</td>
	</tr>
</table>
<?php include_once('footer.php'); ?>
