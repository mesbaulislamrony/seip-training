<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Hobby\Hobby;

$obj = new Hobby();
$val = $obj->index();
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['message']; ?></div>
<?php
}session_destroy();
?>
<div class="page-header">
	<h2>Hobby List</h2>
</div>
<ul class="list-group">
	<?php
	if(sizeof($val) != 0){
		$count = 0;
		foreach ($val as $value) {
		$count ++;
		$sum = $count + $count;
	?>
    <li class="list-group-item clearfix">
        <span class="badge"><?php echo $count; ?></span><?php echo $value['title']; ?>
        <span class="pull-right">
            <a href="show.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-eye-open">&nbsp;</i></a>
            <a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
            <a href="trashed.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
        </span>
    </li>
    <?php
		}
	}else{
		?>
	<li class="list-group-item clearfix">No Hobbys!</li>
		<?php
	}
    ?>
</ul>
<?php include_once('footer.php'); ?>
