<?php
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'e-commerce-website-php');
$sql = "SELECT * FROM products WHERE id=1";
$id = $conn->query($sql)








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="col-md-2"></div>
                   <div class="col-md-8">
                    <div class="row">
                        <h2 class="text-center"> Books</h2> <b3><b3>
                            <?php
                            while($product =mysqli_fetch_assoc($id) ):


                            ?>
                            <div class="col-md-5">
                                <h4> 
                                    <?=$product['title'];?></h4>
                                    <img src="<?=$id['image'];?>" alt="<?=$id['title'];?>"/>
                                    <p class="lprice">Rs <?= $product['price'];?></p>
                                    <a href="details.php">
                                        <button type="button" class = "btn btn-sucess" data-toggle="modal" data-target="#details-1"> more </button> 
                            </a>

                            </div>
                            <?php endwhile;?>

                    </div>
                   </div>
</body>
</html>