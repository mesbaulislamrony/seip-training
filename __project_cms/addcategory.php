<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$categories = $obj->categories();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="table-panel">
                    <div class="page-header"><h4>Add category</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts"><?php echo $_SESSION['message']; ?></p>
                    <?php unset($_SESSION['message']); } ?>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><a href="javaScript:;">New category</a></div>
                                <div class="panel-body">
                                    <form action="control/addcategory.php" method="POST">
                                        <?php  if (!empty($categories)) { ?>
                                        <div class="form-group">
                                            <label for="">Select category</label>
                                            <select class="form-control" name="parent_id">
                                                <option selected="selected" value="0">None</option>
                                                <?php foreach ($categories as $value) { ?>
                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="">Add new category</label>
                                            <input type="text" class="form-control" name="category" placeholder="New category">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Add category</button>
                                    </form>
                                </div>
                                <div class="panel-footer"><a href="javaScript:;">New category</a></div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><a href="javaScript:;">Categories</a></div>
                                <div class="panel-body">
                                    <?php  if (!empty($categories)) { ?>
                                    <ul class="backlist">
                                        <?php 
                                        foreach ($categories as $value) {
                                        $children = $obj->parent_category($value['id']);
                                        ?>
                                        <li>
                                        <span><?php echo $value['title']; ?></span>
                                        <a href="control/deletecategory.php?id=<?php echo $value['id']; ?>" class="pull-right"><i class="fa fa-trash">&nbsp;</i></a>
                                        <a href="editcategory.php?id=<?php echo $value['id']; ?>" class="pull-right"><i class="fa fa-edit">&nbsp;</i></a>
                                            <ul>
                                                <?php
                                                if(!empty($children)){
                                                foreach ($children as $child) {
                                                ?>
                                                <li>
                                                <span><?php echo $child['title']; ?></span>
                                                <a href="control/deletecategory.php?id=<?php echo $child['id']; ?>" class="pull-right"><i class="fa fa-trash">&nbsp;</i></a>
                                                <a href="editcategory.php?id=<?php echo $child['id']; ?>" class="pull-right"><i class="fa fa-edit">&nbsp;</i></a>
                                                </li>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php }else{ ?>
                                    <p>No categories</p>
                                    <?php } ?>
                                </div>
                                <div class="panel-footer"><a href="javaScript:;">Categories</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>