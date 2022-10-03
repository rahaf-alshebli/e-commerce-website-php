<?php
include('./includes/connection.php');


if (isset($_POST["action"])) {
    $query = $conn->query("SELECT products.id , name,image,author,price,category_id,category_name FROM products INNER JOIN category on products.category_id = category.id");
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query = $conn->query("SELECT * FROM products WHERE price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'");
    }
    $total_row = mysqli_num_rows($query);
    $output = '';
    if ($total_row > 0) {
        while ($row = $query->fetch_object()) {
            $output .= '
            <div class="col">
            <div class="card  h-100 " style="    justify-content: space-between;">
            <div class="text-center">
                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:320px;">
                    <img src="admin/images/' . $row->image . '" alt="" style="width: 250px; height:250px" >
                </div>
                <div class="text-center">
                <div class="my-2 fs-4 ">category:.' . $row->category_name . '</div>
                <div class="price md-2">$ ' . $row->price . '</div>
                <div class="cart-btn w-100 price">ADD TO CART</div>
            </div>
            </div>';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}
?>







</div>

</div>
</div>