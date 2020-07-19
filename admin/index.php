<?php include 'includes/header.php'; ?>

<?php

// create query
$query = "SELECT posts.*, categories.name FROM posts INNER JOIN
          categories ON posts.category = categories.id;";

          /* For descending order : ORDER BY posts.title DESC */

// run the query
$posts = mysqli_query($conn, $query);

// create query for categories
$query = "SELECT * FROM categories;";

          /* For descending order : ORDER BY name DESC */

// run the query
$categories = mysqli_query($conn, $query);

?>

<!-- CONTENT HERE -->

<!-- post table -->
<table class="table table-striped">
  <tr>
    <th>Post id</th>
    <th>Post title</th>
    <th>Category</th>
    <th>Author</th>
    <th>Date</th>
  </tr>
  
  <?php while($row = mysqli_fetch_assoc($posts)) : ?>
  <tr>
    <td><?php echo $row['id']; ?></td> <!-- Post id# -->

    <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
    <!-- Post Title -->
    <td><?php echo $row['name']; ?></td>
    <!-- Category will be added by joining from category table -->
    <td><?php echo $row['author']; ?></td><!-- Author -->
    <td><?php echo format_date($row['date']); ?></td><!-- Date -->
  </tr>
  <?php endwhile; ?>

</table>
<br>

<!-- category table -->

<table class="table table-striped">
  <tr>
    <th>Category id</th>
    <th>Category name</th>
  </tr>

  <?php while($row = mysqli_fetch_assoc($categories)) : ?>
  <tr>
    <td><?php echo $row['id']; ?></td> <!-- Post id# -->

    <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
    <!-- Post Title -->
  </tr>
  <?php endwhile; ?>

</table>

<?php include 'includes/footer.php'; ?>
