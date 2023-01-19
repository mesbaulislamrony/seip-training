<?php
include_once('../../header.php');
include_once('../../vendor/autoload.php');
use allproject\book\book;
$obj = new Book();
$id = $obj->getId($_GET);
$value = $obj->show();
?>
<div class="container">
	<?php include_once('navbar.php'); ?>
	<div class="page-header"><h2>Change book title</h2></div>
	<form action="update.php" method="post">
	<div class="form-group">
	    <label for="title">Your favorite book</label>
	    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
	    <input type="text" class="form-control" name="title" placeholder="Book title" value="<?php echo $value['title']; ?>">
	</div>
	<input type="submit" class="btn btn-success" value="Update">
	</form>
</div>
