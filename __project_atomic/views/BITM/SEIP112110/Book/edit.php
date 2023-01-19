<?php
session_start();
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Book\Book;
$obj = new Book();
$id = $obj->getId($_GET);
$value = $obj->show();
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
}
session_destroy();
?>
<div class="page-header">
    <h2>Change book title</h2>
</div>
<form action="update.php" method="post">
<div class="form-group">
    <label for="title">Your favorite book</label>
    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
    <input type="text" class="form-control" name="title" placeholder="Book title" value="<?php echo $value['title']; ?>">
</div>
<input type="submit" class="btn btn-success" value="Update">
</form>
<?php include_once('footer.php'); ?>