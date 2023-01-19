<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\birthday\birthday;

$obj = new Birthday();
$data = $obj->prepare($_GET)->show();
$onedata =  $obj->show();
?>
<div class="container">
    <?php include_once('navbar.php'); ?>
    <table class="table table-bordered">
        <tr>
            <th>Birthday</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>
                <p></p>You Birthday : <?php echo $onedata->title; ?>
                <p>Created At : <?php echo $onedata->created_at; ?></p>
                <p>Modified At : <?php echo $onedata->modified_at; ?></p>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $onedata->id; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
                <a href="trashed.php?id=<?php echo $onedata->id; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
            </td>
        </tr>
    </table>
</div>
