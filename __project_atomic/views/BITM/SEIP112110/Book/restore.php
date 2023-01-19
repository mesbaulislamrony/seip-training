<?php
session_start();
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Book\Book;
$obj = new Book();
$alldata = $obj->trashed();
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
}session_destroy();
?>
<div class="page-header">
	<h2>Restore your deleted books</h2>
</div>
<ul class="list-group">
	<?php
	if( sizeof($alldata) != 0 ){
		foreach($alldata as $value){
	?>
		<li class="list-group-item clearfix">
			<?php echo $value['title']; ?>
			<span class="pull-right">
				<a href="restored.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
				<a href="delete.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
			</span>
		</li>
	<?php
		}
	}else{
	?>
	<li class="list-group-item clearfix">Sorry! Your book list is empty.</li>
	<?php
	}
	?>
</ul>
<?php include_once('footer.php'); ?>

