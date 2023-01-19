<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$obj->prepare($_SESSION);
$articles = $obj->articles();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="table-panel">
                    <div class="page-header"><h4>All articles</h4></div>
                    <?php if(isset($_SESSION['message'])){ ?>
                    <p class="alerts"><?php echo $_SESSION['message']; ?></p>
                    <?php unset($_SESSION['message']); } ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <ul class="list-inline">
                                <li><a href="javaScript:;">All (<?php echo sizeof($articles)?>)</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <?php if (!empty($articles)) { ?>
                            <table class="table table-responsive table-hover">
                                <tr>
                                    <th>Title</th>
                                    <th>Publish on</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                if (empty($_GET)) {
                                    foreach ($articles as $article) {
                                ?>
                                <tr>
                                    <td><?php echo $article['title']; ?></td>
                                    <td>
                                    <?php
                                        $date = date_create($article['created_at']);
                                        echo date_format($date, 'd-M-Y');
                                    ?>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li><a href="<?php echo basepath(); ?>/single.php?id=<?php echo $article['id']; ?>" class="label label-info" target="_blank">View</a></li>
                                            <li><a href="editpost.php?id=<?php echo $article['id']; ?>" class="label label-primary">Edit</a></li>
                                            <li><a href="control/deletepost.php?id=<?php echo $article['id']; ?>" class="label label-danger">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                            <?php }else{ ?>
                            <p>No posts</p>
                            <?php } ?>
                        </div>
                        <div class="panel-footer">
                            <ul class="list-inline">
                                <li><a href="javaScript:;">All (<?php echo sizeof($articles)?>)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>