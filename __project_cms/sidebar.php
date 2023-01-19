<?php if (!isset($_SESSION['username'])) { header('location:login.php'); } ?>
<div class="col-sm-2">
    <div class="row">
        <div class="fixed">&nbsp;</div>
        <div class="sidebar">
            <ul class="list-group">
                <li class="list-group-item"><a href="dashboard.php"><i class="fa fa-dashboard">&nbsp;</i>Dashboard</a></li>
            </ul>
            <a class="list-group-item" href="allposts.php"><i class="fa fa-pencil">&nbsp;</i>Posts</a>
            <ul class="list-group toggle">
                <li class="list-group-item"><a href="allposts.php">All articles</a></li>
                <li class="list-group-item"><a href="newpost.php">Add article</a></li>
                <li class="list-group-item"><a href="addmenu.php">Add menu</a></li>
                <li class="list-group-item"><a href="addcategory.php">Add categories</a></li>
            </ul>
            <?php if($_SESSION['is_admin'] == 1){ ?>
            <ul class="list-group">
                <li class="list-group-item"><a href="allusers.php"><i class="fa fa-user">&nbsp;</i>Users</a></li>
            </ul>
            <?php } ?>
            <a class="list-group-item" href="setting_profile.php"><i class="fa fa-cogs">&nbsp;</i>Settings</a>
            <ul class="list-group toggle">
                <li class="list-group-item"><a href="setting_profile.php">Profile</a></li>
            </ul>
        </div>
    </div>
</div>