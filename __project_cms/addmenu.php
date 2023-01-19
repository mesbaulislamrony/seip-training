<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$obj->prepare($_SESSION);
$menus = $obj->menus();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="table-panel">
                    <div class="page-header"><h4>Add menu</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts"><?php echo $_SESSION['message']; ?></p>
                    <?php unset($_SESSION['message']); } ?>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><a href="javaScript:;">New menu</a></div>
                                <div class="panel-body">
                                    <form action="control/addmenu.php" method="POST">
                                        <div class="form-group">
                                            <label for="">Add new menu</label>
                                            <input type="text" class="form-control" name="menu" placeholder="New Menu">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Add menu</button>
                                    </form>
                                </div>
                                <div class="panel-footer"><a href="javaScript:;">New menu</a></div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <ul class="list-inline">
                                        <li><a href="javaScript:;">All (<?php echo sizeof($menus)?>)</a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <?php  if (!empty($menus)) { ?>
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Menu</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        <?php foreach ($menus as $value) { ?>
                                        <tr>
                                            <td><?php echo $value['title']; ?></td>
                                            <td class="text-center">
                                                <a href="editmenu.php?id=<?php echo $value['id']; ?>"><i class="fa fa-edit">&nbsp;</i></a>
                                                <a href="control/deletemenu.php?id=<?php echo $value['id']; ?>"><i class="fa fa-trash">&nbsp;</i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    <?php }else{ ?>
                                    <p>No menus</p>
                                    <?php } ?>
                                </div>
                                <div class="panel-footer">
                                    <ul class="list-inline">
                                        <li><a href="javaScript:;">All (<?php echo sizeof($menus)?>)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>