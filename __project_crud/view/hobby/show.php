<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\hobby\hobby;

$obj = new Hobby();
$obj->getId($_GET);
$value = $obj->show();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header"><h2>Hobby</h2></div>
	<table class="table table-responsive table-bordered">
		<tr>
			<th>Hobby</th>
			<th>Action</th>
		</tr>
		<tr>
			<td>
			<p><span class="badge"># ID: <?php echo $value['id']; ?></span></p>
			<p><?php echo $value['title']; ?></p>
			<p>Create At: <?php echo $value['created_at']; ?></p>
			<p>Modified At: <?php echo $value['modified_at']; ?></p>
			</td>
			<td>
				<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
				<a href="trashed.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
			</td>
		</tr>
	</table>
</div>
