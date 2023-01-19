<?php
include_once('header.php');
?>
<div class="alert alert-success" role="alert">please check agree box.</div>
<div class="page-header">
	<h2>City List</h2>
</div>
<table class="table table-bordered table-striped">
	<tr>
		<th>City Name</th>
		<th>Action</th>
	</tr>
	<tr>
		<td>City Names</td>
		<td>
			<span class="pull-right">
				<a href="show.php"><i class="glyphicon glyphicon-eye-open">&nbsp;</i></a>
				<a href="edit.php"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
				<a href="trash.php"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
			</span>
		</td>
	</tr>
</table>
<?php include_once('footer.php'); ?>
