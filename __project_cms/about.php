<?php
include_once('header.php');
$articles = $obj->articles();
$recent_articles = $obj->recent_article();
$categories = $obj->categories();
?>
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="aboutus">
 				<h1 class="text-center">About us</h1>
 				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
 				<div class="col-sm-12">
 					<div class="member">
 						<img src="images/members/Sumon_Mahmud.jpg" alt="">
 					</div>
 					<p class="text-center">Sumon Mahmud</p>
 				</div>
 				<div class="col-sm-4">
 					<div class="member">
 						<img src="images/members/Mesbaul_Islam.jpg" alt="">
 					</div>
 					<p class="text-center">Md. Mesbaul Islam</p>
 				</div>
 				<div class="col-sm-4">
 					<div class="member">
 						<img src="images/members/Abdullah_Al_Hasnat.jpg" alt="">
 					</div>
 					<p class="text-center">Abdullah Al-Hasnat</p>
 				</div>
 				<div class="col-sm-4">
 					<div class="member">
 						<img src="images/members/Md_Sayemon.jpg" alt="">
 					</div>
 					<p class="text-center">Md Sayemon</p>
 				</div>
 			</div>
		</div>
	</div>
</section>
<?php
include_once('footer.php');
?>