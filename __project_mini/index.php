<?php
if(!isset($_SESSION)){session_start();}
include_once('header.php');
include_once('vendor/autoload.php');
use miniproject\mini;

$obj = new mini();
$obj->prepare($_SESSION);
$profile = $obj->profile();
$plist = $obj->profile_list();
?>
<section class="user-profile">
	<div class="container">
		<div class="row">
			<div class="page-header">
				<h3>
				Well come
				<?php if (!empty($profile)){echo $profile['first_name']." "; echo $profile['last_name'];} ?>
				</h3>
			</div>
			<div class="container-fluid">
				<div class="row">
				<?php if(!isset($_SESSION['user_roll'])){ ?>
					<blockquote>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					<footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				<?php }else{ ?>
					<?php if($_SESSION['user_roll'] == 1){ ?>
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>SR</th>
								<th>User Name</th>
								<th>User Id</th>
								<th>Email</th>
								<th class="text-center">Action</th>
							</tr>
							<?php
							$i = 0;
							if (!empty($plist)) {
							foreach($plist as $value){
							$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $value['username']; ?></td>
								<td><?php echo $value['unique_id']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td class="text-right">
								<?php if ($value['is_active'] == NULL) { ?>
								<a href="view/c_status.php?confirm=<?php echo $value['unique_id']; ?>" class="btn btn-primary btn-xs">Confirm</a>
								<?php }elseif($value['is_active'] == 1){ ?>
								<a href="view/c_status.php?deactive=<?php echo $value['unique_id']; ?>" class="btn btn-danger btn-xs">Deactive</a>
								<?php }elseif($value['is_active'] == 2){ ?>
								<a href="view/c_status.php?active=<?php echo $value['unique_id']; ?>" class="btn btn-info btn-xs">Active</a>
								<?php } ?>
								<?php if ($value['is_active'] != NULL) { ?>
								<a href="profile.php?user_id=<?php echo $value['unique_id']; ?>" class="btn btn-default btn-xs">view profile</a>
								<?php } ?>
								<a href="view/c_delete.php?user_id=<?php echo $value['unique_id']; ?>" class="btn btn-danger btn-xs">delete</a>
								</td>
							</tr>
							<?php
							}
							}
							?>
						</table>
					</div>
					<?php }else{ ?>
						<blockquote class="blockquote-reverse">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
