<?php
include('includes/header.php');
include("./includes/connect.php");
?>

<style>
  .viewLess {
  display: block !important;
  -webkit-box-orient:unset !important;
  -moz-box-orient: unset !important;
  box-orient: unset !important;
  -webkit-line-clamp: 0 !important;
  overflow: none !important;
  text-overflow: unset !important;
}

.drms {
  cursor: pointer;
  color: #003cff;
}

.drms:hover {
  text-decoration: underline;
}

.descRm {
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
  box-orient: vertical;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
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
            <?php 
                $query = mysqli_query($conn, "SELECT DISTINCT category_name, id FROM category");
            ?>
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control">
              <option value="" hidden>--Choose Category--</option>
            <?php 
              while($dta = mysqli_fetch_array($query))
              {
                ?>
                <option value="<?php echo $dta['id']; ?>"><?php echo $dta['category_name']; ?></option>
                <?php
              }
              ?>
              </select>
            <!-- <input type="Category" class="form-control" id="Category" aria-describedby="Category" name="category"> -->

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
            <div class="inputgroup mb-3">

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php 
          if(isset($_POST['submit']))
          {
            $pname = $_POST['productName'];
            $desc = $_POST['description'];
            $sku = $_POST['sku'];
            $catgory = $_POST['category'];
            $price = $_POST['price'];
            $author = $_POST['author'];
            $discountId = null;
            $createdAt = date('Y-m-d h:m:s');
            $modAt = $createdAt;

            
            $ins = "INSERT INTO products 
            (name, description, SKU, price, discount_id, created_at, modified_at, author, image, category_id)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $statement = $conn->prepare($ins);

            // File name
            $filename = $_FILES['image']['name'];
            
            // Location
            $target_file = 'images/'.$filename;

            // file extension
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);

            $file_extension = strtolower($file_extension);

            // Valid image extension
            $valid_extension = array("png","jpeg","jpg");

            if(in_array($file_extension, $valid_extension)) 
            {
              // Upload file
              if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) 
              {
                  // Execute query
                  $statement->bind_param("ssiiissssi", $pname, $desc, $sku, $price, $discountId, $createdAt, $modAt, $author, $filename, $catgory);
                  $statement->execute();
                  ?>
                    <script>
                      alert("Product Added Successfully");
                      window.location.href="addproducts.php";
                    </script>
                  <?php
              }
              else
              {
                ?>
                  <script>
                    alert("Failed to add product, please try again!");
                    window.location.href="addproducts.php";
                  </script>
                <?php
              }
            }
          }
        ?>
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
        <?php 
        if(isset($_GET['id']))
        {
          $editId = $_GET['id'];
          
          $s = mysqli_query($conn, "SELECT * FROM products WHERE id = '$editId'");
          $sdt = mysqli_fetch_array($s);
          ?>
          <h2 class="text-center mt-5"> Edit Products </h2>
            <div class="container-fluid">
              <form action="productEdit.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                  <label for="productID" class="form-label">ID</label>
                  <input type="text" class="form-control" id="productID" aria-describedby="productID" name="productID" value="<?php echo $editId; ?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="prductName" class="form-label">Product Name</label>
                  <input type="text" class="form-control" value="<?php echo $sdt['name']; ?>" id="prductName1" aria-describedby="prductName" name="productName">
                </div>
                <div class="mb-3">
                  <label for="Description" class="form-label">Description</label>
                  <textarea class="form-control" name="description"><?php echo $sdt['description']; ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="sku" class="form-label">SKU</label>
                  <input type="number" class="form-control" id="SKU" name="sku" value="<?php echo $sdt['SKU']; ?>">
                </div>
                <div class="mb-3">
                  <?php 
                      $query = mysqli_query($conn, "SELECT DISTINCT category_name, id FROM category");
                  ?>
                  <label for="category" class="form-label">Category</label>
                  <select name="category" id="category" class="form-control" required>
                    <option value="" hidden>--Choose Category--</option>
                  <?php 
                    while($dta = mysqli_fetch_array($query))
                    {
                      ?>
                      <option value="<?php echo $dta['id']; ?>"><?php echo $dta['category_name']; ?></option>
                      <?php
                    }
                    ?>
                    </select>
                  <!-- <input type="Category" class="form-control" id="Category" aria-describedby="Category" name="category"> -->

                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="Number" class="form-control" id="price" value="<?php echo $sdt['price']; ?>" name="price">
                </div>

                <div class="mb-3">
                  <label for="author" class="form-label">Author</label>
                  <input type="author" class="form-control" id="author" value="<?php echo $sdt['author']; ?>" name="author" aria-describedby="author">
                </div>

                <div class="mb-3">
                  <label for="custom-file" class="form-label"> Upload Image</label> <br>
                  <div class="inputgroup mb-3">

                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
            <button onclick="return confirm('Are you sure you want to edit this Product?')" type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>    
          </div>
          <?php
        }
        else
        {
        ?>
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
                <th>created_at</th>
                <th>modified_at</th>
                <th>author</th>
                <th>image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            <tbody>
              <?php
              $sqltable = "SELECT * FROM products";
              if ($result = mysqli_query($conn, $sqltable)) {
                if (mysqli_num_rows($result) > 0) {
                  $num = 1;
                  while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $productName = $row['name'];
                    $discrption = $row['description'];
                    $sku = $row['SKU'];
                    $category = $row['category_id'];
                    $created_at = $row['created_at'];
                    $price = $row['price'];
                    $author = $row['author'];
                    $modified_at = $row['modified_at'];
                    $image =  $row['image'];
                    echo "<tr>
                              <td> $id  </td>
                              
                              <td> $productName </td>
                              <td>
                              <p class='descm' id='descrm'> $discrption </p>
                              
                              </td>
                              <td> $sku  </td>
                              <td> $category  </td>
                              <td> $price  </td>
                              <td> $created_at  </td>
                              <td> $modified_at  </td>
                              <td> $author  </td>
                              <td>  <img src='./images/$image' width='100vw' height='100hw'></td>";

                              //  echo ' <td> <a href="read.php?id=' . $row['id'] . '" ><span class="fa fa-eye"></span></a> </td>';
                              echo '<td> <a href="addproducts.php?id=' . $row['id'] . '"> <span class="fa fa-eye"></span></a></td>';
                              echo '<td> <a href="productDelete.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this Product?\')"><span class="fa fa-trash"></span></a></td>';

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
        <?php
      } 
      ?>
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