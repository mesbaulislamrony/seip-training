<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\SummaryOfOrganization\Summary;

$obj = new Summary();
$obj->getID($_GET);
$value = $obj->show();
?>
<div class="page-header">
	<h2>Summary</h2>
</div>
<div class="summary">
	<h4><?php echo $value['title']; ?>
	<span class="pull-right">
		<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
		<a href="trash.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
	</span>
	</h4>
	<p><?php echo $value['summary']; ?></p>
</div>
<?php include_once('footer.php'); ?>
