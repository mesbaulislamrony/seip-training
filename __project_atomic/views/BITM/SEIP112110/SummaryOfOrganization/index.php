<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\SummaryOfOrganization\Summary;
$obj = new Summary();
$values = $obj->index();
if (isset($_SESSION['massage'])) {
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php
}session_unset();
?>
<div class="page-header">
	<h2>Summary list</h2>
</div>
<?php
if( sizeof($values) != 0 ){
	foreach ($values as $value) {
?>
<div class="summary">
	<h4><a href="show.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
	<span class="pull-right">
		<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
		<a href="trash.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
	</span>
	</h4>
	<p><?php echo $value['summary']; ?></p>
</div>
<?php
	}
}else{
?>
<div class="alert alert-danger" role="alert">No summary here.</div>
<?php
}
?>
<?php include_once('footer.php'); ?>
