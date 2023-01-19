<?php
include_once("header.php");
include_once('vendor/autoload.php');
use Programs\Program;

$obj = new Program();
$obj->prepare($_GET);
$value = $obj->show();
//strpos($a,'C');
?>
<h2>Select your favourite programming language</h2>
<form action="update.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
	<label><input type="checkbox" name="program[]" value="Forton" <?php if(in_array('Forton',$value['language'])){echo "checked";}; ?>>Forton</label><br>
	<label><input type="checkbox" name="program[]" value="C" <?php if(in_array('C',$value['language'])){echo "checked";}; ?>>C</label><br>
	<label><input type="checkbox" name="program[]" value="C++" <?php if(in_array('C++',$value['language'])){echo "checked";}; ?>>C++</label><br>
	<label><input type="checkbox" name="program[]" value="PHP" <?php if(in_array('PHP',$value['language'])){echo "checked";}; ?>>PHP</label><br>
	<label><input type="checkbox" name="program[]" value="C#" <?php if(in_array('C#',$value['language'])){echo "checked";}; ?>>C#</label><br>
	<label><input type="checkbox" name="program[]" value="Porl" <?php if(in_array('Porl',$value['language'])){echo "checked";}; ?>>Porl</label><br>
	<label><input type="checkbox" name="program[]" value="Python" <?php if(in_array('Python',$value['language'])){echo "checked";}; ?>>Python</label><br>
	<label><input type="checkbox" name="program[]" value="Java" <?php if(in_array('Java',$value['language'])){echo "checked";}; ?>>Java</label><br>
	<hr>
	<input type="submit" value="Update">
</form>
<?php include_once("footer.php"); ?>

