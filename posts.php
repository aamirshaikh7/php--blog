<?php include './config/config.php'; ?>
<?php include './libraries/dbhandler.inc.php'; ?>

<?php include './helpers/format_helper.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to PHP Lover Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body>

   <!--  BS 3
   <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active current" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All posts</a>
          <a class="blog-nav-item" href="#">About</a>
        </nav>
      </div>
  </div> -->

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/LOGO2.png"  width="70px">
    </a>

    <!-- nav button -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="#navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="posts.php">All posts</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Team</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Connect</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

<div class="container">

      <div class="blog-header">
        <div class="logo">
          <img src="images/LOGO2.png" width="70%">
        </div>
        <h1 class="blog-title">PHP Lovers Blog</h1>
        <p class="lead blog-description">PHP news, tutorials, videos and more...</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

<!-- header.php's line 2 will not gonna do anything, until we create a database object -->

<?php

  // check URL for the category

  if(isset($_GET['category']))
  {
    $category = $_GET['category'];

    // create query for posts
    $query = "SELECT * FROM posts WHERE category = ".$category."ORDER BY id DESC;";

    // run the query
    $posts = mysqli_query($conn, $query);
  }

  else
  {
    // create query for posts
    $query = "SELECT * FROM posts ORDER BY id DESC;";

    // run the query
    $posts = mysqli_query($conn, $query);
  }

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

