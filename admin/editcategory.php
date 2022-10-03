<?php
    include("./includes/connect.php");
    if(isset($_POST['cid']))
    {
        $catID = $_POST['cid'];
        $cname = $_POST['category'];
        
        $update = mysqli_query($conn, "UPDATE category SET id = '$catID', category_name = '$cname' WHERE id = '$catID'");
        
        if($update)
        {
            ?>
            <script>
                alert("Category has been updated Successfully");
                window.location.href = "addcategory.php";
            </script>
            <?php
        }
        else 
        {
            ?>
            <script>
                alert("Failed to update Category, please try again!");
                window.location.href = "addcategory.php";
            </script>
            <?php
        }
    }
?>