<?php
session_start();
include_once('../../header.php');
?>

<div class="container">
    <?php include_once('navbar.php'); ?>
    <div class="page-header"><h2>Add birthday</h2></div>
    <form action="store.php" method="post">
        <div class="form-group">
            <label for="title">Your birthday</label>
            <div class='input-group'>
                <input type='text' class="form-control" name="title" placeholder="Your birthday" id="datetimepicker" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Save">
    </form>
</div>