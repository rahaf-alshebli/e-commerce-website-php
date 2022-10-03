<?php

include "./includes/dbcon.php";

$sql = "SELECT id,category_name FROM category";
$result = $conn->query($sql);

    
if ($result->num_rows > 0) {
    // output data of each row
    ?>

<div class="col-12 mt-5 pb-5">
<ul class="list-group list-group-flush">
    <?php 
    while ($row = $result->fetch_assoc()) {
?>      
    <a href="./category.php?category_name=<?php echo $row['category_name']; ?>">
        <li class="list-group-item"><?php echo $row['category_name'] ?></li>
    </a>

<?php
    }
 
} else {
    echo "0 results";
}
?>
   </div>
