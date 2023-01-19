<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\profile\profile;
$obj = new profile();
$value = $obj->profile();
if (isset($_SESSION['message'])) {
?>
<div class="alert alert-success" role="alert">
	<?php echo $_SESSION['message']; session_unset(); ?>
</div>
<?php } ?>
<div class="page-header">
	<h2>Profile</h2>
</div>
<?php if(isset($value['is_active'])){ ?>
<div class="row profile">
	<div class="col-sm-4">		
		<img src="images/<?php echo $value['profile_photo']; ?>" alt="" class="img-responsive img-thumbnail">
	</div>
	<div class="col-sm-7">
		<h3><?php echo $value['user_name']; ?></h3>
		<p>Student of BASIS ( bitm )</p>
		<p><em>active now</em></p>
	</div>
	<div class="col-sm-1">
		<a href="edit.php?id=<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-edit">&nbsp;</span></a>
	</div>
</div>
<?php }else{ ?>
<p>No profile here</p>
<?php } ?>