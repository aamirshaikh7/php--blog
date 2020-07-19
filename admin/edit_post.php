<?php include 'includes/header.php'; ?>

<!-- same as add_post -->

<?php

	$id = $_GET['id']; // getting id from URL into $id

	// create query for posts
	$query = "SELECT * FROM posts WHERE id =".$id; // this id should be called from URL

	// run the query
	$post = mysqli_query($conn, $query);
  	$post = mysqli_fetch_assoc($post);
	

	// create query for categories
	$query = "SELECT * FROM categories;";

	// run the query
	$categories = mysqli_query($conn, $query);
	
?>

<!-- form -->

<!-- update posts -->

<?php

if(isset($_POST['submit']))
  {
    // assign POST variables

    // new field that user will enter
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $category=mysqli_real_escape_string($conn, $_POST['category']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);

    // simple validation

    if(empty($title) || empty($body) || empty($category) || empty($author) || empty($tags))
    {
      // display error
      header("Location: edit_post.php?field=empty");
      $error = 'Please, fill out all the required fields !';
    }

    else
    {
      $query = "UPDATE posts SET
                title = '$title',
                body = '$body',
                category = '$category',
                author = '$author',
                tags = '$tags'
                WHERE id = ".$id;

      $update_row = mysqli_query($conn, $query);
      header("Location: index.php?post-updated");
    }

  }

?>

<!-- delete posts -->

<?php

if(isset($_POST['delete']))
{
  // create query

  $query = "DELETE FROM posts WHERE id = ".$id;
  $delete_row = mysqli_query($conn, $query);
  
  header("Location: index.php?post-deleted");
}

?>

<form role="form" method="POST" action="edit_post.php?id=<?php echo $id; ?>">

  <div class="form-group">
    <label>Post Title :</label>
    <input name="title" type="text" class="form-control" placeholder="Enter title" value="<?php echo $post['title']; ?>">
  </div>

  <div class="form-group">
    <label>Post Body :</label>
    <textarea name="body" type="text" class="form-control" placeholder="Enter post body">
    	<?php echo $post['body']; ?>
    </textarea>
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
			<option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
		<?php endwhile; ?>
	</select>

  </div>

  <div class="form-group">
    <label>Author :</label>
    <input name="author" type="text" class="form-control" placeholder="Enter author name" value="<?php echo $post['author']; ?>">
  </div>

  <div class="form-group">
    <label>Tags :</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter tags" value="<?php echo $post['tags']; ?>">
  </div>

	<div class="button">
	  <button name="submit" type="submit" class="btn btn-default">Submit</button>
	  <a href="index.php" class="btn btn-default">Cancel</a>

  	<button name="delete" type="submit" class="btn btn-danger">    Delete
    </button>	

	</div>

</form>

<?php include 'includes/footer.php'; ?>
