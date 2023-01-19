<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\terms_and_conditions\conditions
;
$obj = new conditions();
$values = $obj->index();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Terms List</h2>
	</div>
	<form action="update.php" method="POST">
		<ul class="list-group">
			<?php foreach ($values as $value){ ?>
				<li class="list-group-item clearfix">
					<?php echo $value['title']; ?>
					<input type="checkbox" name="agree[]" value="<?php echo $value['is_check'] ?>" class="pull-right" <?php if($value['is_check'] != 0){echo "checked";} ?>>
				</li>		
			<?php } ?>
		</ul>
		<div class="form-group">
			<button class="form-control btn btn-default">Change aggrement</button>
		</div>
	</form>

</div>
