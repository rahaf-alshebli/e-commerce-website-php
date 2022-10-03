<?php 

   include "includes\connect.php";

    $id = $_GET['id'];

    if(mysqli_connect_error())
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        $delete = mysqli_query($conn, "DELETE FROM products WHERE id = $id");

        if($delete)
        {
            ?>
            <script>
                alert("Product Deleted Successfully");
                window.location.href = "addproducts.php";
            </script>
            <?php
        }

        else 
        {
            ?>
            <script>
                alert("Failed to Delete Product. please try again!");
                window.location.href = "addproducts.php";
            </script>
            <?php
        }
    }
?>