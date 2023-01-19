<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\profile_picture\profile;

$obj = new profile();
$values = $obj->index();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header"><h2>Profile Pictures</h2></div>
	<div class="row">
		<?php
		if (sizeof($values) != 0) {
			foreach ($values as $value) {
		?>
		<div class="col-sm-4">
			<div class="propic">
				<img src="images/<?php echo $value['profile_image']; ?>" alt="" class="img-responsive img-thumbnail">
				<?php if(isset($value['set_as'])){ ?>
				<span class="ok glyphicon glyphicon-ok"></span>
				<?php }else{ ?>
				<span class="action">
					<a href="setas.php?id=<?php echo $value['id']; ?>" title="Set as profile picture"><span class="glyphicon glyphicon-ok">&nbsp;</span></a>
					<a href="edit.php?id=<?php echo $value['id']; ?>" title="Update profile picture"><span class="glyphicon glyphicon-edit">&nbsp;</span></a>
					<a href="delete.php?id=<?php echo $value['id']; ?>" title="Delete profile picture"><span class="glyphicon glyphicon-trash">&nbsp;</span></a>
				</span>
				<?php } ?>
			</div>
		</div>
		<?php
			}
		}
		?>
	</div>
</div>