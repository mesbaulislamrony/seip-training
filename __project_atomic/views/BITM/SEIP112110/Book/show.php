<?php
include_once('header.php');
include_once('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Book\Book;
$obj = new Book();
$id = $obj->getId($_GET);
$single = $obj->show();
?>
<div class="page-header">
	<h2>Your favorite book name</h2>
</div>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <td>Book name</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><b><?php echo $single['title']; ?></b></p>
                <em>Create At : <?php echo $single['created_at']; ?></em><br/>
                <em>Last modified At :  <?php echo $single['modified_at']; ?></em>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $single['id']; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
                <a href="trash.php?id=<?php echo $single['id']; ?>" title="Delete Temporary"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
            </td>
        </tr>
    </tbody>
</table>
<?php include_once('footer.php');?>