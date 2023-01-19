<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\hobby\hobby;
$obj = new Hobby();
$values = $obj->trashed();
?>
<div class="container">
    <?php include_once('navbar.php') ?>
    <div class="page-header">
        <h2>Restore hobby</h2>
    </div>
    <ul class="list-group">
        <?php
        if(sizeof($values)){
            foreach ($values as $value) {
        ?>
        <li class="list-group-item clearfix">
            <?php echo $value['title'] ?>
            <span class="pull-right">
                <a href="restored.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
                <a href="delete.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
            </span>
        </li>
        <?php
            }
        }else{
        ?>
        <li class="list-group-item clearfix">Opps! No data here.</li>
        <?php
        }
        ?>
    </ul>
</div>



