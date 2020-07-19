<?php include 'includes/header.php'; ?>

<!-- action = add_category.php (inc)-->
<?php 

  if(isset($_POST['submit']))
  {
    // assign POST variables

    $name = $_POST['name'];

    // simple validation

    if(empty($name))
    {
      // display error
      $error = 'Please, fill out all the required fields !';
    }

    else
    {
      $query = "INSERT INTO categories(name) VALUES('$name');";
      $update_row = mysqli_query($conn, $query);

      mysqli_fetch_assoc($update_row);
      header("Location: index.php?category-added");
    }

  }

?>

<!-- adding form -->

<form role="form" method="POST" action="add_category.php">

  <div class="form-group">
    <label>Category name :</label>
    <input type="text" name="name" class="form-control" placeholder="Enter category" value="">
  </div>
 
	<div class="button"> 
	  <button type="submit" name="submit" class="btn btn-default" value="submit">Submit</button>
	  <a href="index.php" class="btn btn-default">Cancel</a>
	</div>

</form>

<?php include 'includes/footer.php'; ?>