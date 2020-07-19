<?php include 'includes/header.php'; ?>

<!-- action = add_post.php (inc)-->
<?php 

  if(isset($_POST['submit']))
  {
    // assign POST variables

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $category=mysqli_real_escape_string($conn, $_POST['category']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);

    // simple validation

    if(empty($title) || empty($body) || empty($category) || empty($author) || empty($tags))
    {
      // display error
      $error = 'Please, fill out all the required fields !';
    }

    else
    {
      $query = "INSERT INTO posts(title, body, category, author, tags)VALUES('$title', '$body', $category, '$author', '$tags');";
      $insert_row = mysqli_query($conn, $query);
      header("Location: index.php?post-added");
    }

  }

?>

<?php
  // create query for categories
  $query = "SELECT * FROM categories;";

  // run the query
  $categories = mysqli_query($conn, $query);
  
?>

<!-- form -->

<form role="form" method="POST" action="add_post.php">

  <div class="form-group">
    <label>Post Title :</label>
    <input name="title" type="text" class="form-control" placeholder="Enter title">
  </div>

  <div class="form-group">
    <label>Post Body :</label>
    <textarea name="body" type="text" class="form-control" placeholder="Enter post body"></textarea>
  </div>

  <div class="form-group">
    <label>Category :</label>

    <select name="category" class="form-control">
      <?php while($row = mysqli_fetch_assoc($categories)) : ?>
        <?php if($row['id'] == $post['category'])
            {
            $selected = 'selected';
            } 

          else
          {
            $selected = '';
          }
        ?>
      <option <?php echo $selected; ?> value="<?php echo$row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php endwhile; ?>
  </select>

  </div>

  <div class="form-group">
    <label>Author :</label>
    <input name="author" type="text" class="form-control" placeholder="Enter author name">
  </div>

  <div class="form-group">
    <label>Tags :</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter tags">
  </div>

	<div class="button">
	  <button name="submit" type="submit" class="btn btn-default">Submit</button>
	  <a href="index.php" class="btn btn-default">Cancel</a>
	</div>

</form>

<?php include 'includes/footer.php'; ?>