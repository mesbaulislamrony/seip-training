<?php
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$modelObj = new Mobile();
$data = $modelObj->trash();
?>

<?php include_once('../../header.php'); ?>
<div class="container">
    <?php include_once('navbar.php'); ?>
    <?php if(isset($_SESSION['massage'])){ ?>
        <div class="alert alert-success" role="alert"><?php echo $_SESSION['massage']; ?></div>
    <?php unset($_SESSION['massage']); } ?>

    <div class="page-header"><h2>Trashed list</h2></div>
    <ul class="list-group">
        <?php
        if(sizeof($data) != 0){
            foreach ($data as $value) {
            ?>
            <li class="list-group-item clearfix">
            <?php echo $value['title']; ?>
                <span class="pull-right">
                <a href="delete.php?id=<?php echo $value['id']; ?>" title="Delete Parmanetly"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
                </span>
                <span class="pull-right">
                <a href="restore.php?id=<?php echo $value['id']; ?>" title="Restore Data"><i class="glyphicon glyphicon-floppy-open">&nbsp;</i></a>
                </span>
            </li>
            <?php
            }
        }else{
        ?>
        <li class="list-group-item"><h3>No data here!</h3></li>
        <?php } ?>
    </ul>
</div>
<?php include_once('../../footer.php'); ?>