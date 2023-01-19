<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\summaryOfOrganization\summary;

$obj = new Summary();
$values = $obj->trashed();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header"><h2>Trashed city list</h2></div>
	<?php
		if (sizeof($values) != 0) {
	?>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Trashed Summary List</th>
		</tr>
		<?php foreach ($values as $value) {	?>
		<tr>
			<td>
				<strong>
					<?php echo $value['title']; ?>
					<span class="pull-right">
						<a href="restored.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
						<a href="delete.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
					</span>
				</strong> 
				<p><?php echo $value['summary']; ?></p>
			</td>
		</tr>
		<?php }	?>	
	</table>
	<?php
	}else{
	?>
	<div class="alert alert-danger" role="alert">No summary here.</div>
	<?php
	}
	?>
</div>
