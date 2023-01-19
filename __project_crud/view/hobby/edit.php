<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\hobby\hobby;
$obj = new Hobby();
$obj->getId($_GET);
$value = $obj->show();
$exploded = explode(',', $value['title']);
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Update hobby</h2>
	</div>
	<form class="form-horizontal" action="update.php" method="POST">
		<div class="form-group">
			<div class="col-xs-12">
				<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
				<div class="checkbox">
					<label><input type="checkbox" name="hobby[]" value="Cricket" <?php if(in_array('Cricket',$exploded)){echo "checked";} ?> > Cricket</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="hobby[]" value="Football" <?php if(in_array('Football',$exploded)){echo "checked";} ?> > Football</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="hobby[]" value="Pool" <?php if(in_array('Pool',$exploded)){echo "checked";} ?> > Pool</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="hobby[]" value="Hocky" <?php if(in_array('Hocky',$exploded)){echo "checked";} ?> > Hocky</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12">
				<input type="submit" class="btn btn-success form-control" value="Update">
			</div>
		</div>
	</form>
</div>

