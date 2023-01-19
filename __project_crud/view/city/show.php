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
		<h2>City Name</h2>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>City Name</th>
			<th>Action</th>
		</tr>
		<tr>
			<td>
			<p><strong><?php echo $value['title']; ?></strong></p>
			<p>Created at : <?php echo $value['created_at']; ?></p>
			<p>Modified at : <?php echo $value['modified_at']; ?></p>
			</td>
			<td>
				<span class="pull-right">
					<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
					<a href="trash.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
				</span>
			</td>
		</tr>
	</table>
</div>
