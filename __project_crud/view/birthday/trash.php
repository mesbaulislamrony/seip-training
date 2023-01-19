<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\birthday\birthday;

$obj = new Birthday();
$onedata =  $obj->trash();
?>
<div class="container">
    <?php include_once('navbar.php'); ?>
    <div class="page-header"><h2>Restore birthday</h2></div>
    <ul class="list-group">
            <?php
            if(sizeof($onedata) != 0){
            foreach ($onedata as $value){
            ?>
        <li class="list-group-item clearfix">
                <?php echo $value['title']; ?>
            <span class="pull-right">
                <a href="delete.php?id=<?php echo $value['id']; ?>" title="Delete Parmanetly"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
            </span>
            <span class="pull-right">
                <a href="restore.php?id=<?php echo $value['id']; ?>" title="Restore Data"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
            </span>
        </li>
            <?php
            }
            }else{
            ?>
        <li class="list-group-item">No data here!</li>
            <?php } ?>
    </ul>
</div>


