<?php
include_once("header.php");
include_once("vendor/autoload.php");
use Programs\Program;

$obj = new Program();
$values = $obj->index();

if(isset($_SESSION['message'])){
	echo $_SESSION['message'];
	session_destroy();
}
?>
<h2>Your favourite programming language.</h2>
<table border="1" width="100%">
	<tr>
		<th>SR</th>
		<th>Programming language.</th>
		<th>Action</th>
	</tr>
	<?php
		$sr = 0;
		foreach ($values as $value) {
		$sr++;
	?>
	<tr>
		<td><?php echo $sr; ?></td>
		<td><?php echo $value['language']; ?></td>
		<td align="right">
			<a href="show.php?id=<?php echo $value['id']; ?>">Show</a> |
			<a href="edit.php?id=<?php echo $value['id']; ?>">Edit</a> |
			<a href="trash.php?id=<?php echo $value['id']; ?>">Trash</a>
		</td>
	</tr>
	<?
	}
	?>
</table>
<?php
include_once("footer.php");
?>