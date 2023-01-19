<?php
include_once('header.php');
include_once ('../../../../vendor/autoload.php');
use Atomicproject\BITM\SEIP112110\Mobile\Mobile;

$modelObj = new Mobile();
$data = $modelObj->prepare($_GET)->show();
?>
<div class="page-header">
	<h2>Your favorite mobile model</h2>
</div>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <td>Mobile Model</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
         if( isset($data->title) && !empty($data->title)  ){
         ?>
        <tr>
            <td>
                <p><b><?php echo $data->title; ?></b></p>
                <em>Create At : <?php echo $data->create_at; ?> </em><br/>
                <em>Last modified At : <?php
                if($data->create_at == $data->update_at){
                        echo "Change at first time";
                    }else{
                        echo $data->update_at;
                    }
                ?> </em>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $data->id; ?>"><i class="glyphicon glyphicon-edit">&nbsp;</i></a>
                <a href="trashed.php?id=<?php echo $data->id; ?>" title="Delete Temporary"><i class="glyphicon glyphicon-trash">&nbsp;</i></a>
            </td>
        </tr>
        <?php
         }else{
             echo "no data";
         }
        ?>
    </tbody>
</table>

<?php include_once('footer.php');?>