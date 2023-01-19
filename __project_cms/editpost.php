<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$categories = $obj->categories();
$obj->prepare($_GET);
$article = $obj->select_articles();
$sfore = $obj->select_for_edit();
$menus = $obj->menus();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="dashboard">
                    <div class="page-header"><h4>Edit article</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts">
                    <?php echo $_SESSION['message']; ?>
                    <a href="<?php echo basepath(); ?>/single.php?id=<?php echo $article['id']; ?>" target="_blank">View</a>
                    </p>
                    <?php unset($_SESSION['message']); } ?>
                    <form action="control/updatepost.php" method="POST">
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" value="<?php echo $article['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subtitle" value="<?php echo $article['sub_title']; ?>">
                                </div>
                                <textarea class="form-control" id="mytextarea" name="html_details"><?php echo $article['html_details']; ?></textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Update article</div>
                                    <div class="panel-body">
                                        <p>Now you can update the post.</p>
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Change category</div>
                                    <div class="panel-body">
                                        <ul class="backlist">
                                            <?php
                                            if (!empty($categories)) {
                                                foreach ($categories as $category) {
                                            ?>
                                            <li>
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $category['id']; ?>" name="cat_id[]" <?php if($sfore['category_id'] == $category['id']){ echo "checked";} ?>><?php echo $category['title']; ?></label></div>
                                                <ul>
                                                    <?php
                                                    $children = $obj->parent_category($category['id']);
                                                    if(!empty($children)){
                                                    foreach ($children as $child) {
                                                    ?>
                                                    <li>
                                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $child['id']; ?>" name="cat_id[]" <?php if($sfore['category_id'] == $child['id']){ echo "checked";} ?>><?php echo $child['title']; ?></label></div>
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
                                    <div class="panel-heading"><a href="javaScript:;">Change menu</a></div>
                                    <div class="panel-body">
                                        <?php if (!empty($menus)) { ?>
                                        <div class="form-group">
                                            <select class="form-control" name="menu_id">
                                                <option selected="selected" value="0">None</option>
                                                <?php foreach ($menus as $menu) { ?>
                                                <option value="<?php echo $menu['id']; ?>" <?php if($sfore['menu_id'] == $menu['id']){ echo "selected";} ?>><?php echo $menu['title']; ?></option>
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