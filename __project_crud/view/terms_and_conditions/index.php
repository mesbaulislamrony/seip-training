<?php
session_start();
include_once('../../header.php');
?>
<div class="container">
	<?php include_once('navbar.php') ?>
	<div class="page-header">
		<h2>Terms and conditions</h2>
	</div>
	<form action="store.php" method="POST">
		<div class="row">
			<div class="container-fluid text-justify agrement">
				<p>The following terms have been tailored throughout ten years of design self-employment to protect both the client and designer during a working relationship.All services provided by the designer shall be for the exclusive use of the client other than for the designer’s promotional use. Upon payment of all fees, the following reproduction rights for all approved final designs created by the designer for this project shall be granted.</p>
			</div>
		</div>
		<div class="form-group">
			<label for="">Your email</label>
			<input type="text" class="form-control" name="email" placeholder="Type your email">
		</div>
		<div class="checkbox">		
			<label><input type="checkbox" name="agree"> I agree</label>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
