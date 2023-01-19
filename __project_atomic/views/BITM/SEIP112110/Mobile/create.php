<?php
include_once('header.php');
session_start();
if(isset($_SESSION['massage'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php unset($_SESSION['massage']); } ?>

<div class="page-header">
    <h2>Add Mobile Models</h2>
</div>
<form action="store.php" method="post">
<div class="form-group">
        <label for="title">Your favorite mobile model</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Mobile model">
</div>
<input type="submit" class="btn btn-success" value="Save and Continue">
</form>