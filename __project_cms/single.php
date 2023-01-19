<?php
include_once('header.php');
$obj->prepare($_GET);
$article = $obj->select_articles();
$recent_articles = $obj->recent_article();
$categories = $obj->categories();
?>
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 post-content">	
				<div class="page-header">
					<h4><a href="single.php"><?php echo $article['title'] ?></a></h4>
					<p>Published on : <?php $date = date_create($article['created_at']); echo date_format($date, 'M-d-Y');?></p>
				</div>
				<p><?php echo $article['html_details'] ?></p>
			</div>
			<div class="col-sm-4">
				<div class="page-header">
					<h4><a href="javaScript:;">Recent Post</a></h4>
				</div>
				<?php if (!empty($recent_articles)) { ?>
				<ul class="recent">
					<?php foreach ($recent_articles as $recent) { ?>
					<li><a href="single.php?id=<?php echo $recent['id'] ?>"><?php echo $recent['title'] ?></a></li>
					<?php } ?>
				</ul>
				<?php }else{ ?>
					<p>No recent posts</p>
				<?php } ?>
				<div class="page-header">
					<h4><a href="javaScript:;">Categories</a></h4>
				</div>
				<?php if (!empty($categories)) { ?>
				<ul>
					<?php foreach ($categories as $category) { ?>
					<li>
					<a href="categories.php?id=<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
						<ul>
						<?php
							$children = $obj->parent_category($category['id']);
						    if(!empty($children)){
						    	foreach ($children as $child) {
						    ?>
						    <li><a href="categories.php?id=<?php echo $child['id']; ?>"><?php echo $child['title']; ?></a></li>
						    <?php
						    	}
						    }
						    ?>
						</ul>
					</li>
					<?php } ?>
				</ul>
				<?php }else{ ?>
				<p>No Categories</p>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php
include_once('footer.php');
?>