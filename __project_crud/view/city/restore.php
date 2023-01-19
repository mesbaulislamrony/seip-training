<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\city\city;

$obj = new City();
$values = $obj->trashed();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Trashed city list</h2>
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>City Name</th>
			<th>Action</th>
		</tr>
		<?php
		if(sizeof($values) != 0){
			foreach ($values as $value) {
		?>
		<tr>
			<td><?php echo $value['title']; ?></td>
			<td>
				<span class="pull-right">
					<a href="restored.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
					<a href="delete.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
				</span>
			</td>
		</tr>
		<?php
			}
		}else{
		?>
		<tr>
			<td colspan="2" align="center">No Data here.</td>
		</tr>
		<?php } ?>
	</table>
</div>

