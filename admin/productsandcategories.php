<?php
include('includes/header.php');




?>

<?php


include("./includes/connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $discrption = $_POST['description'];
    $sku = $_POST['sku'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = time() . '-' . $_FILES['image']['name'];

    // the image to a specific folder first and this folder for example called (images)

    $target_dir = "images/";
    $target_file = $target_dir . basename($image);




    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
      $sql = "INSERT INTO products(name,description,SKU,category,image,author,price) 
       VALUES('$productName','$discrption','$sku','$category','$image','$author','$price')";


      //if the data has been saved in the database , redirect the user to the main page
      if (mysqli_query($conn, $sql)) {
        header("Refresh:0");
      }
    }
  }
}


?>

<div id="wrapper">
  <?php include('./includes/sidebar.php'); ?>


  <!-- begain of content  -->

  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <?php include('./includes/navbar-top.php'); ?>


      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <h2 class="text-center mt-5"> Add Product </h2>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="prductName" class="form-label">Product Name</label>
            <input type="prductName" class="form-control" id="prductName1" aria-describedby="prductName" name="productName">

          </div>
          <div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
          <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="Number" class="form-control" id="SKU" name="sku">
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="Category" class="form-control" id="Category" aria-describedby="Category" name="category">

          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="Number" class="form-control" id="price" name="price">
          </div>

          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="author" class="form-control" id="author" name="author" aria-describedby="author">
          </div>

          <div class="mb-3">
            <label for="custom-file" class="form-label"> Upload Image</label> <br>
            <div class="input-group mb-3">

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>


        <!-- Content Row -->

        <div class="row">



          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">




            </div>








          </div>

        </div>
        <!-- /.container-fluid -->

        <h2 class="text-center mt-5"> Products </h2>
        <div class="container-fluid">
          <table class="table table-striped " style="width: 100%;">
            <thead>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>SKU</th>
                <th>category</th>
                <th>price</th>
                <th>discount_id</th>
                <th>created_at</th>
                <th>modified_at</th>
                <th>author</th>
                <th>image</th>
              </tr>
            <tbody>
              <?php
              $sqltable = "SELECT * FROM products";
              if ($result = mysqli_query($conn, $sqltable)) {
                if (mysqli_num_rows($result) > 0) {

                  while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $productName = $row['name'];
                    $discrption = $row['description'];
                    $sku = $row['SKU'];
                    $category = $row['category'];
                    $discount_id  = $row['discount_id'];
                    $created_at = $row['created_at'];
                    $price = $row['price'];
                    $author = $row['author'];
                    $modified_at = $row['modified_at'];
                    $image =  $row['image'];
                    echo "<tr>
                                    <td> $id  </td>
                                        <td>  <img src='./images/$image' width='150vw' height='150hw'>  </td>

                                         <td> $image </td>

                                         <td> $productName </td>
                                         <td> $discrption </td>
                                         <td> $sku  </td>
                                         <td> $category  </td>
                                         <td> $price  </td>
                                         <td> $author  </td>
                                         <td> $created_at  </td>
                                         <td> $modified_at  </td>";



                                        //  echo ' <td> <a href="read.php?id=' . $row['id'] . '" ><span class="fa fa-eye"></span></a> </td>';
                                        //  echo '<td> <a href="update.php?id=' . $row['id'] . '"> <span class="fa fa-eye"></span></a></td>';
                                        //  echo '<td> <a href="delete.php?id=' . $row['id'] . '" ><span class="fa fa-trash"></span></a></td>';

                    echo "</tr>";
                  }

                  mysqli_free_result($result);
                } else {
                  echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
              } else {
                echo "Oops! Something went wrong. Please try again later.";
              }
              ?>
            </tbody>
            </thead>

          </table>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>


  </div>




  <?php include('./includes/footer.php'); ?>