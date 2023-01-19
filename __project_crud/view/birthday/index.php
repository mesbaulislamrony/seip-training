<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\birthday\birthday;

$obj = new Birthday();
$alldata = $obj->index();
?>
<div class="container">
    <?php include_once('navbar.php') ?>
    <div class="page-header"><h2>Birthday List</h2></div>
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
</div>