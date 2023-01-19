<?php
session_start();
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Mobile\Mobile;

$modelObj = new Mobile();
$data = $modelObj->index();
if(isset($_SESSION['massage'])){
?>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
<?php unset($_SESSION['massage']); } ?>
<div class="page-header">
	<h2>Mobile mobile list</h2>
</div>
<ul class="list-group">
	<?php
            if( sizeof($data) != 0 ){
                foreach($data as $value){
                    ?>
	<li class="list-group-item clearfix">
		<?php
                if( isset($value['title']) && !empty($value['title']) ){
                     echo $value['title'];
                }else{
                    echo "No data";
                }               
                ?>
		<span class="pull-right">
			<a href="show.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-eye-open">&nbsp;</i></a>
			<a href="edit.php?id=<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
			<a href="trashed.php?id=<?php echo $value['id']; ?>" title="Delete Temporary"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
		</span>
	</li>
	<?php        
            }	
        }else{
            ?>
        <li class="list-group-item"><h3>No data here!</h3></li>
            <?php  } ?>
</ul>
<?php include_once('footer.php');?>