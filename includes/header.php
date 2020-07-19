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

<div id="slides" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#slides" data-slide-top="0" class="active"></li>
    <li data-target="#slides" data-slide-top="1"></li>
    <li data-target="#slides" data-slide-top="2"></li>
  </ul>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/BG2.jpeg">

      <div class="carousel-caption">
        <h1 class="display-2">ABSMEDIA</h1>
        <h3>Welcome to our blog</h3>
        <button type="button" class="btn btn-outline-light btn-lg">VIEW DEMO</button>
        <button type="button" class="btn btn-primary btn-lg">Get Started</button>
      </div>

    </div>

    <div class="carousel-item">
      <img src="images/BG3.jpeg">
    </div>

    <div class="carousel-item">
      <img src="images/BG1.jpeg">
    </div>
  </div>
</div> 

</div>

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