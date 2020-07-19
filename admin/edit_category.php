<?php include 'includes/header.php'; ?>

<!-- adding form -->

<?php
	$id = $_GET['id']; // getting id from URL into $id

	// create query for posts
	$query = "SELECT * FROM categories WHERE id =".$id; // this id should be called from URL

	// run the query
	$category = mysqli_query($conn, $query);
	$category = mysqli_fetch_assoc($category);
	

	// create query for categories
	$query = "SELECT * FROM categories;";

	// run the query
	$categories = mysqli_query($conn, $query);
	
?>

<!-- update category -->

<?php

if(isset($_POST['submit']))
  {
    // assign POST variables

    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // simple validation

    if(empty($name))
    {
      // display error
    	header("Location: edit_category.php?field=empty");
      $error = 'Please, fill out all the required fields !';
    }

    else
    {
      $query = "UPDATE categories SET
                name = '$name'
                WHERE id = ".$id;

      $update_row = mysqli_query($conn, $query);
      header("Location: index.php?category-updated");
    }

  }

?>

<!-- delete category -->

<?php

if(isset($_POST['delete']))
{
  // create query

  $query = "DELETE FROM categories WHERE id = ".$id;
  $delete_row = mysqli_query($conn, $query);

  header("Location: index.php?category-deleted");
}

?>

<form role="form" method="POST" action="edit_category.php?id=<?php echo $id; ?>">

  <div class="form-group">
    <label>Category name :</label>
    <input type="text" name="name" class="form-control" placeholder="Enter category" value="<?php echo $category[name]; ?>">
  </div>
 
	<div class="button"> 

	  <button type="submit" name="submit" class="btn btn-default">Submit</button>
	  <a href="index.php" class="btn btn-default">Cancel</a>

	  <button name="delete" type="submit" class="btn btn-danger">
    Delete
    </button>	
	  
	</div>

</form>

<?php include 'includes/footer.php'; ?>