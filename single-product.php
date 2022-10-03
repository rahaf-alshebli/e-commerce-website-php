<?php
include_once 'includes/dbcon.php';
if (empty($_GET['id'])) {
  die("Please enter a valid product id");
}

$product_id = $_GET['id'];

// check if this id is in the db

$stmt = $conn->prepare("SELECT * FROM products where ID = ?");
$stmt->bind_param("i", $product_id);    // show it
$stmt->execute();
$results = $stmt->get_result();
$results = $results->fetch_assoc();


if (empty($results)) {
  die('404 No product found with this id');
}

$product_name = $results['name'];
$product_description = $results['description'];
$product_price = $results['price'];
$product_image = $results['image'];
$product_category_id = $results['category_id'];




/////// review
$stmt = $conn->prepare("SELECT * FROM comments where product_id = ?");
$stmt->bind_param("i", $product_id);   //show it
$stmt->execute();
$results = $stmt->get_result();
$comments = $results->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $product_name ?> </title>
  <link rel="shortcut icon" href="./image/Baghdad.png" type="image/x-icon" />

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->
  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END -->

  <!-- Page level plugin styles START -->
  <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
  <link href="assets/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="assets/pages/css/components.css" rel="stylesheet">
  <link href="assets/corporate/css/style.css" rel="stylesheet">
  <link href="assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">
  <!-- BEGIN STYLE CUSTOMIZER -->
  <div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
      <p>THEME COLOR</p>
      <ul class="inline">
        <li class="color-red current color-default" data-style="red"></li>
        <li class="color-blue" data-style="blue"></li>
        <li class="color-green" data-style="green"></li>
        <li class="color-orange" data-style="orange"></li>
        <li class="color-gray" data-style="gray"></li>
        <li class="color-turquoise" data-style="turquoise"></li>
      </ul>
    </div>
  </div>
  <!-- END BEGIN STYLE CUSTOMIZER -->

  <!-- BEGIN TOP BAR -->
  <div class="pre-header">
    <div class="container">
      <div class="row">

        <div class="col-md-9 col-sm-7">
          <div class="product-page">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="product-main-image">
                  <img src="./admin/images/<?php echo $product_image ?>" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="./admin/images/<?php echo $product_image ?>">
                </div>

              </div>
              <div class="col-md-6 col-sm-6">
                <h1><?php echo  $product_name ?></h1>
                <div class="price-availability-block clearfix">
                  <div class="price">
                    <strong><span>$</span><?php echo $product_price ?></strong>
                  </div>
                  <div class="availability">
                    Ctegory: <strong><?php echo $product_category_id  ?></strong>
                  </div>
                </div>
                <div class="description">
                  <p><?php echo  $product_description ?></p>
                </div>

                <div class="product-page-cart">
                  <div class="product-quantity">
                    <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                  </div>
                  <button class="btn btn-primary" type="submit">Add to cart</button>
                </div>
                <div class="review">




                  <?php
                  $select = " SELECT AVG(rating) AS avg FROM `comments` where product_id = $product_id ";
                  $r = mysqli_query($conn, $select);

                   if($row = mysqli_fetch_assoc($r)){
                    $b= $row['avg'];
                    if ($b != '') {
                      $b= $row['avg'];
                    }else{
                      $b = 0;
                    }
                    
                   }
                    
                  
                  echo "<input type='range' value= " . $b . " step='0.25' id='backing4' disabled>";
                  ?>
                  <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                  </div>
                  <a href="javascript:;"><?php echo $b ?> Stars</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
                </div>

              </div>

              <div class="product-page-content">
                <ul id="myTab" class="nav nav-tabs">
                  <li><a href="#Description" data-toggle="tab">Description</a></li>
                  <!--                    <li><a href="#Information" data-toggle="tab">Information</a></li>-->
                  <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (<?php echo count($comments) ?>)</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade" id="Description">
                    <p>
                      <?php echo $product_description ?>
                    </p>
                  </div>
                  <div class="tab-pane fade" id="Information">
                    <table class="datasheet">
                      <tr>
                        <th colspan="2">Additional features</th>
                      </tr>
                      <tr>
                        <td class="datasheet-features-type">Value 1</td>
                        <td>21 cm</td>
                      </tr>
                      <tr>
                        <td class="datasheet-features-type">Value 2</td>
                        <td>700 gr.</td>
                      </tr>
                      <tr>
                        <td class="datasheet-features-type">Value 3</td>
                        <td>10 person</td>
                      </tr>
                      <tr>
                        <td class="datasheet-features-type">Value 4</td>
                        <td>14 cm</td>
                      </tr>
                      <tr>
                        <td class="datasheet-features-type">Value 5</td>
                        <td>plastic</td>
                      </tr>
                    </table>
                  </div>
                  <div class="tab-pane fade in active" id="Reviews">
                    <!--<p>There are no reviews for this product.</p>-->
                    <?php foreach ($comments as $comment) { ?>
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong><?php echo $comment[2] ?></strong>
                          <em><?php echo $comment[4] ?> </em>
                          <div class="rateit" data-rateit-value="<?php echo $comment[5] ?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>
                        <div class="review-item-content">
                          <?php echo $comment[3] ?>

                        </div>
                      </div>

                    <?php } ?>

                    <!-- BEGIN FORM-->
                    <form action="write-review.php?id= <?php echo $product_id ?>" class="reviews-form" role="form" method="POST">

                      <h2>Write a review</h2>

                      <div class="form-group">
                        <label for="name">Name <span class="require">*</span></label>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="review">Review <span class="require">*</span></label>
                        <textarea name="comment" class="form-control" rows="8" id="review"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="email">Rating</label>
                        <input type="range" value="4" step="0.25" id="backing5" name="rating">
                        <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                        </div>
                      </div>
                      <div class="padding-top-20">
                        <button type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </form>
                    <!-- END FORM-->
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- END CONTENT -->
      </div>
      <!-- END SIDEBAR & CONTENT -->

      <!-- BEGIN SIMILAR PRODUCTS -->


      <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
      <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
      <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- END CORE PLUGINS -->

      <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
      <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
      <script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
      <script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
      <script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
      <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
      <script src="assets/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>

      <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
      <script type="text/javascript">
        jQuery(document).ready(function() {
          Layout.init();
          Layout.initOWL();
          Layout.initTwitter();
          Layout.initImageZoom();
          Layout.initTouchspin();
          Layout.initUniform();
        });
      </script>
      <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>