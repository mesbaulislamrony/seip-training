<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$categories = $obj->categories();
$menus = $obj->menus();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="newpost">
                    <div class="page-header"><h4>New article</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts">
                    <?php echo $_SESSION['message']; ?>
                    <?php if(isset($_SESSION['lastid'])){ ?>
                    <a href="<?php echo basepath(); ?>/single.php?id=<?php echo $_SESSION['lastid']; ?>" target="_blank">View</a>
                    <?php unset($_SESSION['lastid']); } ?>
                    </p>
                    <?php unset($_SESSION['message']); } ?>
                    <form action="control/newpost.php" method="POST">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subtitle" placeholder="Sub title">
                                </div>
                                <textarea class="form-control" id="mytextarea" name="html_details"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><a href="javaScript:;">Article publish</a></div>
                                    <div class="panel-body">
                                        <p>Now you can publish the articles here.</p>
                                        <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><a href="javaScript:;">Select category</a></div>
                                    <div class="panel-body">
                                        <ul class="backlist">
                                            <?php
                                            if (!empty($categories)) {
                                                foreach ($categories as $category) {
                                            ?>
                                            <li>
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $category['id']; ?>" name="cat_id[]"><?php echo $category['title']; ?></label></div>
                                                <ul>
                                                    <?php
                                                    $children = $obj->parent_category($category['id']);
                                                    if(!empty($children)){
                                                    foreach ($children as $child) {
                                                    ?>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $child['id']; ?>" name="cat_id[]"><?php echo $child['title']; ?></label></div>
                                                    </li>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <?php
                                                }
                                            }else{
                                            ?>
                                            <p>No categories</p>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><a href="javaScript:;">Select menu</a></div>
                                    <div class="panel-body">
                                        <?php if (!empty($menus)) { ?>
                                        <div class="form-group">
                                            <select class="form-control" name="menu_id">
                                                <option selected="selected" value="0">None</option>
                                                <?php foreach ($menus as $menu) { ?>
                                                <option value="<?php echo $menu['id']; ?>"><?php echo $menu['title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php }else{ ?>
                                        <p>No menus</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>