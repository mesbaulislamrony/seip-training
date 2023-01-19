<?php
if(!isset($_SESSION)){session_start();}
if (!isset($_SESSION['username'])) { header('location:login.php'); }
include_once('header.php');
include_once('vendor/autoload.php');
use miniproject\mini;

$obj = new mini();
$obj->prepare($_GET);
$value = $obj->profile();
?>
<section class="user-profile">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
						Update profile information
						<a href="profile.php" class="glyphicon glyphicon-remove pull-right"></a>
						</h3>
					</div>
					<div class="panel-body">
						<form action="view/c_update.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<input type="hidden" name="user_id" value="<?php echo $value['user_uniqid']; ?>">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="first_name" value="<?php echo $value['first_name']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="last_name" value="<?php echo $value['last_name']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Personal Phone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="personal_phone" value="<?php echo $value['personal_phone']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Home Phone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="home_phone" value="<?php echo $value['home_phone']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Office Phone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="office_phone" value="<?php echo $value['office_phone']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Current Address</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="current_address" rows="6"><?php echo $value['current_address']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Permanent Address</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="permanent_address" rows="6"><?php echo $value['permanent_address']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Profile Photo</label>
								<div class="col-sm-10">
									<input type="file" name="image">
									<p class="help-block">Upload profile photo here.</p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Update profile</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
