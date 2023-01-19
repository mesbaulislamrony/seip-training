<?php
session_start();
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Birthday\Birthday;

$obj = new Birthday();
$alldata = $obj->index();
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
} session_destroy();
?>
<div class="page-header">
	<h2>Birthday List</h2>
</div>
<ul class="list-group">
    <?php
    if(sizeof($alldata) != 0){
        foreach ($alldata as $value){
    ?>
    <li class="list-group-item clearfix">
            <?php echo $value['title']; ?>
            <span class="pull-right">
                    <a href="show.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-eye-open">&nbsp;</i></a>
                    <a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
                    <a href="trashed.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
            </span>
    </li>
    <?php
        }
    }else{
    ?>
    <li class="list-group-item clearfix">Sorry! No Birthday here.</li>
    <?php
    }
    ?>
</ul>
<?php include_once('footer.php'); ?>
