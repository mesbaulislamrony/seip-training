<?php
include_once('header.php');
$value = $obj->single();
?>
<div class="page-header">
	<h2>Profile Picture</h2>
</div>
<?php if(is_bool($value) == false){ ?>
<div class="row">
	<div class="col-sm-4">
		<div class="propic">
			<img src="images/<?php echo $value['profile_photo']; ?>" alt="" class="img-responsive img-thumbnail">
			<div class="action">
				<a href="listprofile.php" title="Change profile"><span class="glyphicon glyphicon-edit"></span></a>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<h3><?php echo $value['user_name']; ?></h3>
		<p><strong>SEIP - 112110</strong></p>
		<p>Student of BITM</p>
	</div>
</div>
<?php }else{ ?>
<p>Here is no profile. Please create profile first.</p>
<?php } ?>