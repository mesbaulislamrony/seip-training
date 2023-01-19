<?php
session_start();
include_once('header.php');
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
}
session_destroy();
?>
<div class="page-header">
    <h2>Add Book</h2>
</div>
<form action="store.php" method="post">
<div class="form-group">
    <label for="title">Your favorite book</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Book title">
</div>
<input type="submit" class="btn btn-success" value="Save and Continue">
</form>
<?php include_once('footer.php'); ?>