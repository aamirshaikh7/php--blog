<?php include 'includes/header.php'; ?>

<!-- header.php's line 2 will not gonna do anything, until we create a database object -->

<?php

	// create query for posts
	$query = "SELECT * FROM posts ORDER BY id DESC;";
	/* New post will show up on top : ORDER BY id DESC */

	// run the query
	$posts = mysqli_query($conn, $query);


	// create query for categories
	$query = "SELECT * FROM categories;";

	// run the query
	$categories = mysqli_query($conn, $query);
?>

<?php
	// check if there are any posts ?

	if($posts) :
?>

	<?php while($row = mysqli_fetch_assoc($posts)) : ?>

	<div class="blog-post">

	    <h2 class="blog-post-title"> <?php echo $row['title']; ?> </h2>
	    <p class="blog-post-meta"> <?php echo format_date($row['date']); ?>  by
	    	<a href="#"> <?php echo $row['author']; ?> </a></p>

	    <p>
	    <?php echo shorten_text($row['body']); ?>
		</p>

	    <!-- read more link -->

	    <a href="post.php?id=<?php echo urlencode($row['id']); ?>"
	    	class="readmore">Read more</a>

	</div><!-- /.blog-post -->

	<?php endwhile; ?>

<?php else : ?>

	<p>There are no posts yet !</p>

<?php endif; ?>


 <!--  <ul class="pager">
    <li><a href="#">Previous</a></li>
    <li><a href="#">Next</a></li>
  </ul> -->


<?php
	include 'includes/footer.php';
?>