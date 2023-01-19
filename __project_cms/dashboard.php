<?php
include_once('header_dashboard.php');
if (!isset($_SESSION['username'])) { header('location:login.php'); }
$obj->prepare($_SESSION);
$articles = $obj->articles();
$categories = $obj->categories();
$allusers = $obj->profiles();
?>
<div class="container-fluid">
    <div class="row">
        <?php include_once('sidebar.php'); ?>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="dashboard">
                    <div class="page-header"><h4>Dashboard</h4></div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><a href="javaScript:;">Activity</a></div>
                                <div class="panel-body">
                                    <p>Recently Published</p>
                                    <?php if (!empty($articles)) { ?>
                                    <dl class="dl-horizontal recent-post">
                                        <?php foreach ($articles as $article) { ?>
                                        <dt>
                                        <?php
                                            $date = date_create($article['created_at']);
                                            echo date_format($date, 'M-d-Y');
                                        ?>
                                        </dt>
                                        <dd><a href="<?php echo basepath(); ?>/single.php?id=<?php echo $article['id']; ?>" target="_blank"><?php echo $article['title']; ?></a></dd>
                                        <?php } ?>
                                    </dl>
                                    <?php }else{ ?>
                                    <p>No recent articles</p>
                                    <?php } ?>
                                </div>
                                <div class="panel-footer"><a href="javaScript:;">Activity</a></div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><a href="javaScript:;">At a Glance</a></div>
                                <div class="panel-body">
                                    <ul class="list-inline">
                                        <li><a href="allposts.php"><i class="fa fa-pencil">&nbsp;</i><?php echo sizeof($articles); ?> Articles</a></li>
                                        <li><a href="addcategory.php"><i class="fa fa-life-ring" aria-hidden="true">&nbsp;</i><?php echo sizeof($categories); ?> Category</a></li>
                                        <li><a href="allusers.php"><i class="fa fa-users" aria-hidden="true">&nbsp;</i><?php echo sizeof($allusers); ?> Users</a></li>
                                    </ul>
                                </div>
                                <div class="panel-footer"><a href="javaScript:;">At a Glance</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer_dashboard.php') ?>