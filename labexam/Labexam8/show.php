<?php
include_once("header.php");
include_once("vendor/autoload.php");
use Programs\Program;

$obj = new Program();
$obj->prepare($_GET);
$value = $obj->show();
?>
<h2>Category list</h2>
<table border="1" width="100%">
	<tr>
		<th>Category</th>
		<th>Action</th>
	</tr>
	<tr>
		<td>
		<p><?php echo $value['language']; ?></p>
		<p>Created at : <?php echo $value['created_at']; ?></p>
		<p>Last update : <?php echo $value['updated_at']; ?></p>
		
		</td>
		<td align="right">
			<a href="edit.php?id=<?php echo $value['id']; ?>">Edit</a> |
			<a href="trash.php?id=<?php echo $value['id']; ?>">Remove</a>
		</td>
	</tr>
</table>
<?php
include_once("footer.php");
?>