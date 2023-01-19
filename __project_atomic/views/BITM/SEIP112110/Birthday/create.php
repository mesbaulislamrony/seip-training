<?php
session_start();
include_once('header.php');
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
} session_destroy();
?>
<div class="page-header">
    <h2>Add birthday</h2>
</div>
<form action="store.php" method="post">
    <div class="form-group">
        <label for="title">Your birthday</label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" name="title" placeholder="Your birthday" id="datetimepicker" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="Save">
</form>