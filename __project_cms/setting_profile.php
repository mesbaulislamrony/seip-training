<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$obj->prepare($_SESSION);
$value = $obj->profile();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="setting">
                    <form action="control/setting_profile.php" method="POST" class="form-horizontal clearfix" enctype="multipart/form-data">
                        <div class="page-header"><h4>Personal info</h4></div>
                        <?php if(isset($_SESSION['message'])){ ?>
                        <p class="alerts"><?php echo $_SESSION['message']; ?></p>
                        <?php unset($_SESSION['message']); } ?>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" value="<?php echo $value['first_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" value="<?php echo $value['last_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="<?php echo $value['email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Personal Phone</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="personalphone" value="<?php echo $value['personal_phone']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Home Phone</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="homephone" value="<?php echo $value['home_phone']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Office Phone</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="officephone" value="<?php echo $value['office_phone']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Present address</label>
                                <div class="col-sm-9">
                                <textarea class="form-control" name="currentaddress"><?php echo $value['current_address']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Permanent address</label>
                                <div class="col-sm-9">
                                <textarea class="form-control" name="permanentaddress"><?php echo $value['permanent_address']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Profile picture</label>
                                <div class="col-sm-9">
                                <input type="file" name="image">
                                <p class="help-block">Change your profile picture here.</p>
                                </div>
                            </div>
                            <div class="page-header"><h4>Account Management</h4></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $value['username']; ?>" disabled>
                                <p class="help-block">Usernames cannot be changed.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" value="<?php echo $value['password']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <?php if(!empty($value['profile_pic'])){ ?>
                            <img src="images/<?php echo $value['profile_pic']; ?>" alt="" class="img-responsive img-thumbnail">
                            <?php }else{ ?>
                            <p>No profile photo</p>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>