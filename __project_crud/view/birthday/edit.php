<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\birthday\birthday;

$obj = new Birthday();
$data = $obj->prepare($_GET)->show();
$onedata =  $obj->show();
?>
<div class="container">
    <?php include_once('navbar.php') ?>
    <div class="page-header"><h2>Update birthday</h2></div>
    <form action="update.php" method="post">
        <div class="form-group">
            <label for="title">Change birthday</label>
            <div class='input-group'>
                <input type="hidden" name="id" value="<?php echo $onedata->id; ?>">
                <input type='text' class="form-control" name="title" placeholder="Your birthday" value="<?php echo $onedata->title; ?>" id="datetimepicker" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Update">
    </form>
</div>
