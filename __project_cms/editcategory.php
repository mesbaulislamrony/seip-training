<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$obj->prepare($_GET);
$categories = $obj->categories();
$categoryedit = $obj->categoryID();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="table-panel">
                    <div class="page-header"><h4>Edit category</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts"><?php echo $_SESSION['message']; ?></p>
                    <?php unset($_SESSION['message']); } ?>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Edit category</div>
                                <div class="panel-body">
                                    <form action="control/updatecategory.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $categoryedit['id']; ?>">
                                        <div class="form-group">
                                        <label for="">Select parent category</label>
                                            <select class="form-control" name="parent_id">
                                                <option selected="selected" value="0">None</option>
                                                <?php foreach ($categories as $value) { ?>
                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Edit category</label>
                                        <input type="text" class="form-control" name="category" value="<?php echo $categoryedit['title']; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                    </form>
                                </div>
                                <div class="panel-footer">Edit category</div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Categories</div>
                                <div class="panel-body">
                                    <?php  if (!empty($categories)) { ?>
                                    <ul>
                                        <?php 
                                        foreach ($categories as $value) {
                                        $children = $obj->parent_category($value['id']);
                                        ?>
                                        <li>
                                        <?php echo $value['title']; ?>
                                        <a href="control/deletecategory.php?id=<?php echo $value['id']; ?>" class="pull-right"><i class="fa fa-trash">&nbsp;</i></a>
                                        <a href="editcategory.php?id=<?php echo $value['id']; ?>" class="pull-right"><i class="fa fa-edit">&nbsp;</i></a>
                                            <ul>
                                            <?php
                                                if(!empty($children)){
                                                foreach ($children as $child) {
                                                ?>
                                                <li>
                                                <?php echo $child['title']; ?>
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
                                    <?php } ?>
                                </div>
                                <div class="panel-footer">Categories</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>