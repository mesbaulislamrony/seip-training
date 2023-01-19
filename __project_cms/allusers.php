<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
if ($_SESSION['is_admin'] != 1) { header('location:dashboard.php'); }
$allusers = $obj->profiles();
$trashuser = $obj->trash_users();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="table-panel">
                    <div class="page-header"><h4>All users</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts"><?php echo $_SESSION['message']; ?></p>
                    <?php unset($_SESSION['message']); } ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <ul class="list-inline">
                                <?php if (!empty($allusers)) { ?>
                                <li><a href="allusers.php">All (<?php echo sizeof($allusers) ?>)</a></li>
                                <?php } ?>
                                <?php if (!empty($trashuser)) { ?>
                                <li><a href="allusers.php?users=trash">Trash (<?php echo sizeof($trashuser) ?>)</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <?php
                                if (empty($_GET)) {
                                    if (!empty($allusers)) {
                                        foreach ($allusers as $user) {
                                ?>
                                <tr>
                                    <td>                                    
                                    <span class="img">
                                        <?php if(!empty($user['profile_pic'])){ ?>
                                        <img src="images/<?php echo $user['profile_pic']; ?>" alt="" class="img-responsive">
                                        <?php }else{ ?>
                                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                        <?php } ?>
                                    </span>
                                    <span><?php echo $user['username']; ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        echo $user['first_name']." ";
                                        echo $user['last_name'];
                                        ?>
                                    </td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php if ($user['is_admin'] == 1) { echo "Admin"; }else{ echo "User"; } ?></td>
                                    <td class="text-center">
                                        <?php if ($user['is_admin'] != 1){ ?>
                                        <ul class="list-inline">
                                            <?php if ($user['is_active'] == NULL){ ?>
                                            <li><a href="control/action.php?confirm=<?php echo $user['unique_id']; ?>" class="label label-success">Confirm</a></li>
                                            <li><a href="control/action.php?delete=<?php echo $user['unique_id']; ?>" class="label label-danger">Delete</a></li>
                                            <?php }else{ ?>
                                            <?php if ($user['is_active'] == 1){ ?>
                                            <li><a href="control/action.php?disable=<?php echo $user['unique_id']; ?>" class="label label-warning">Blocked</a></li>
                                            <?php }elseif($user['is_active'] == 2){ ?>
                                            <li><a href="control/action.php?active=<?php echo $user['unique_id']; ?>" class="label label-primary">Unblocked</a></li>
                                            <?php } ?>
                                            <li><a href="control/action.php?trash=<?php echo $user['unique_id']; ?>" class="label label-danger">Trash</a></li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }else{
                                ?>
                                <tr><td colspan="6">No Users</td></tr>
                                <?php
                                    }
                                }elseif ($_GET['users'] == 'trash') {
                                    if (!empty($trashuser)) {
                                        foreach ($trashuser as $user) {
                                ?>
                                <tr>
                                    <td>
                                    <?php if(!empty($user['profile_pic'])){ ?>
                                    <span class="img"><img src="images/<?php echo $user['profile_pic']; ?>" alt="" class="img-responsive"></span>
                                    <?php } ?>
                                    <span><?php echo $user['username']; ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        echo $user['first_name']." ";
                                        echo $user['last_name'];
                                        ?>
                                    </td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php if ($user['is_admin'] == 1) { echo "Admin"; }else{ echo "User"; } ?></td>
                                    <td>
                                        <ul class="list-inline">
                                            <li><a href="control/action.php?restore=<?php echo $user['unique_id']; ?>" class="label label-success">Restore</a></li>
                                            <li><a href="control/action.php?delete=<?php echo $user['unique_id']; ?>" class="label label-danger">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }else{
                                ?>
                                <tr><td colspan="6">No Users</td></tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <ul class="list-inline">
                                <?php if (!empty($allusers)) { ?>
                                <li><a href="allusers.php">All (<?php echo sizeof($allusers) ?>)</a></li>
                                <?php } ?>
                                <?php if (!empty($trashuser)) { ?>
                                <li><a href="allusers.php?users=trash">Trash (<?php echo sizeof($trashuser) ?>)</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>