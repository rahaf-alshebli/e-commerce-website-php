<?php
    include('includes/header.php');
    include("./includes/connect.php");
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
        <h2 class="text-center mt-5">Add Category </h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" aria-describedby="categoryName" name="category">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php 
    if(isset($_POST['category']))
    {
        $cat = $_POST['category'];
        
        $INS = mysqli_query($conn, "INSERT INTO category (category_name) VALUES ('$cat')");
        
        if($INS)
        {
            ?>
            <script>
                alert("Category added Successfully");
            </script>
            <?php
        }
    }
    
?>
<?php
    if(isset($_GET['edit']))
    {
        $cId = $_GET['edit'];
        $q = mysqli_query($conn, "SELECT * FROM category WHERE id = '$cId'");
        $dt = mysqli_fetch_array($q);
        ?>
        <h2 class="text-center mt-5"> Edit Category </h2>
        <form id="editcatForm" action="editcategory.php" method="POST">
            <div class="mb-3">
                <label for="categoryid" class="form-label">Category ID</label>
                <input type="text" class="form-control" id="categoryid" aria-describedby="categoryid" value="<?php echo $cId; ?>" name="cid" readonly>
            </div>
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" aria-describedby="categoryName" value="<?php echo $dt['category_name']; ?>" name="category">
            </div>
            <button form="editcatForm" type="submit" name="editSubmit" onclick="return confirm('Are you sure you want to edit this Category?')" class="btn btn-primary">Edit Changes</button>    
        </form>
        <?php
    }
    else
    {
    
        ?>
        <h2 class="text-center mt-5"> Categories </h2>
        <div class="container-fluid">
            <table class="table table-striped " style="width: 100%;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            <tbody>
                <?php
                $sqltable = "SELECT * FROM category";
                if ($result = mysqli_query($conn, $sqltable)) 
                {
                    if (mysqli_num_rows($result) > 0) 
                    {

                        while ($row = mysqli_fetch_array($result)) 
                        {
                            $id = $row['id'];
                            $category = $row['category_name'];
                        
                            echo "<tr>
                            <td> $id  </td>
                            <td> $category </td>";
                            //echo ' <td> <a href="read.php?id=' . $row['id'] . '" ><span class="fa fa-eye"></span></a> </td>';
                            echo '<td> <a href="addcategory.php?edit=' . $row['id'] . '"> <span class="fa fa-eye"></span></a></td>';
                            echo '<td> <a href="addcategory.php?delete=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this Category?\')"><span class="fa fa-trash"></span></a></td>';

                            echo "</tr>";
                        }

                            mysqli_free_result($result);
                    } 
                    else 
                    {
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                }
                else 
                {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                ?>
            </tbody>
            </thead>

            </table>
        <?php 
    }

    if(isset($_GET['delete']))
    {
        $catId = $_GET['delete'];
        $query = mysqli_query($conn, "DELETE FROM category WHERE id = '$catId'");
        
        if($query)
        {
            ?>
            <script>
                alert("Category has been deleted Successfully");
                window.location.href = "addcategory.php";
            </script>
            <?php 
        }
        else 
        {
            ?>
            <script>
                alert("Failed to delete Category, please try again!");
                window.location.href = "addcategory.php";
            </script>
            <?php
        }
    }
    ?>
</div>
</div>
</div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2022</span>
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