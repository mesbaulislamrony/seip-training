<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\profile_picture\profile;

$obj = new profile();
$value = $obj->single();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header"><h2>Profile Picture</h2></div>
	<div class="row">
		<div class="col-sm-4">
			<div class="propic">
				<img src="images/<?php echo $value['profile_image']; ?>" alt="" class="img-responsive img-thumbnail">
				<span class="action">
					<a href="create.php" title="Add profile photo"><span class="glyphicon glyphicon-camera">&nbsp;</span></a>
				</span>
			</div>
		</div>
		<div class="col-sm-8">
			<h3>Md. Mesbaul Islam</h3>
			<p><strong>SEIP - 112110</strong></p>
			<p>Student of BITM</p>
		</div>
	</div>
</div>