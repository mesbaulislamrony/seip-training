<?php
session_start();
include_once("header.php");
if(isset($_SESSION['message'])){
	echo $_SESSION['message'];
	session_destroy();
}
?>
<h2>Select your favourite programming language</h2>
<form action="store.php" method="POST">
	<label><input type="checkbox" name="program[]" value="Forton">Forton</label><br>
	<label><input type="checkbox" name="program[]" value="C">C</label><br>
	<label><input type="checkbox" name="program[]" value="C++">C++</label><br>
	<label><input type="checkbox" name="program[]" value="PHP">PHP</label><br>
	<label><input type="checkbox" name="program[]" value="C#">C#</label><br>
	<label><input type="checkbox" name="program[]" value="Porl">Porl</label><br>
	<label><input type="checkbox" name="program[]" value="Python">Python</label><br>
	<label><input type="checkbox" name="program[]" value="Java">Java</label><br>
	<hr>
	<input type="submit" value="Add new">
</form>
<?php include_once("footer.php"); ?>