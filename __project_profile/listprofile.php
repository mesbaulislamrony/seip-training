<?php
include_once('header.php');

$values = $obj->index();
?>
<div class="page-header">
	<h2>Add new profile picture</h2>
</div>
<div class="row listprofile">
	<?php if (sizeof($values) != 0) {
		foreach ($values as $value) {
	?>
	<div class="col-sm-4">
		<a href="set_as.php?id=<?php echo $value['id']; ?>">
			<div class="thumbnail">
				<img src="images/<?php echo $value['profile_photo']; ?>" alt="" class="img-responsive img-thumbnail">
			</div>
		</a>
		<?php if($value['is_active'] == 1){ ?>
		<span class="set glyphicon glyphicon-ok">&nbsp;</span>
		<?php } ?>
		<a href="trash.php?id=<?php echo $value['id'];  ?>" class="del"><span class="glyphicon glyphicon-trash">&nbsp;</span></a>
		<a href="edit.php?id=<?php echo $value['id'];  ?>" class="edit"><span class="glyphicon glyphicon-edit">&nbsp;</span></a>
	</div>
	<?php
		}
	}else{
	?>
	<div class="container-fluid"><p>Here is no profile. Please create profile first.</p></div>
	<?php } ?>
</div>