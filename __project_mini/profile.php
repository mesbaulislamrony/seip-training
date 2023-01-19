<?php
if(!isset($_SESSION)){session_start();}
if (!isset($_SESSION['username'])) { header('location:login.php'); }
include_once('header.php');
include_once('vendor/autoload.php');
use miniproject\mini;

$obj = new mini();
$obj->prepare($_SESSION);
$obj->prepare($_GET);
$value = $obj->profile();
?>
<section class="user-profile">
	<div class="container">
		<?php
		if(!empty($value)){
		?>
		<div class="row">
			<div class="col-sm-3">
				<img src="images/<?php echo $value['profile_pic']; ?>" class="img-thumbnail img-responsive" alt="">
				<?php if(isset($_SESSION['message'])){ ?>
				<p class="text-center"><?php echo $_SESSION['message']; ?></p>
				<?php unset($_SESSION['message']); }?>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
						Profile
						<a href="edit_profile.php?user_id=<?php echo $value['user_uniqid']; ?>" class="glyphicon glyphicon-edit pull-right"></a></h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td><label>First Name :</label> <?php echo $value['first_name']; ?></td>
								<td><label>Last Name  :</label> <?php echo $value['last_name']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><label>Personal Phone :</label> <?php echo $value['personal_phone']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><label>Home Phone :</label> <?php echo $value['home_phone']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><label>Office Phone :</label> <?php echo $value['office_phone']; ?></td>
							</tr>
							<tr>
								<td colspan="2">
									<p><label><u>Current Address :</u></label></p>
									<address>
										  <?php echo $value['current_address']; ?>
									</address>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p><label><u>Parmanent Address :</u></label></p>
									<address>
										  <?php echo $value['permanent_address']; ?>
									</address>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php
		}else{
		?>
		<p>Here is no profile</p>
		<?php
		}
		?>
	</div>
</section>
