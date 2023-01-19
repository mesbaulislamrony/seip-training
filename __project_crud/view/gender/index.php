<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\gender\gender;

$obj = new gender();
$values = $obj->index();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>User List</h2>
	</div>
	<ul class="list-group">
		<?php
		if (sizeof($values) != 0) {
			foreach ($values as $value) {
		?>
		<li class="list-group-item clearfix">
			<?php echo $value['title']; ?> <em>(<?php echo $value['sex']; ?>)</em>
			<span class="pull-right">
				<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
				<a href="delete.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
			</span>
		</li>
		<?php
			}
		}else{
		?>
		<li class="list-group-item clearfix">No user found.</li>
		<?php
		}
		?>
		
	</ul>
</div>