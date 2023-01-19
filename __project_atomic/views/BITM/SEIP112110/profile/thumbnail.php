<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\profile\profile;
$obj = new profile();
$values = $obj->thumbnail();
if (isset($_SESSION['message'])) {
?>
<div class="alert alert-success" role="alert">
	<?php echo $_SESSION['message']; session_unset(); ?>
</div>
<?php } ?>
<div class="page-header">
	<h2>Profile Photos</h2>
</div>
<div class="row profile">
	<?php
	if(sizeof($values) != 0 ){
		foreach ($values as $value) {
	?>
	<div class="col-sm-3">
		<a href="is_active.php?id=<?php echo $value['id']; ?>" title="Set as profile photo.">
			<?php if($value['is_active'] == 1){ ?>
			<span class="is_active glyphicon glyphicon-ok"></span>
			<?php } ?>
			<img src="images/<?php echo $value['profile_photo']; ?>" alt="" class="img-responsive img-thumbnail">
		</a>
		<span class="delete"><a href="delete.php?id=<?php echo $value['id']; ?>" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></span>
		
	</div>
	<?php
		}
	}else{
	?>
	<div class="container-fluid">
		<div class="alert alert-success" role="alert">No profile photos</div>
	</div>
	<?php
	}
	?>
</div>