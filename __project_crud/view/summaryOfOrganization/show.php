<?php
include_once('../../header.php');
include_once ('../../vendor/autoload.php');
use allproject\summaryOfOrganization\summary;

$obj = new Summary();
$obj->getID($_GET);
$value = $obj->show();
?>
<div class="container">
	<?php include_once('navbar.php') ?>
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
</div>

