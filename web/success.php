<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/session.php';
  

  if(isset($_POST['checkout'])) {
      $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
      $address1 = filter_input(INPUT_POST,'address1',FILTER_SANITIZE_STRING);
      $address2 = filter_input(INPUT_POST,'address2',FILTER_SANITIZE_STRING);
      $city = filter_input(INPUT_POST,'city',FILTER_SANITIZE_STRING);
      $state = filter_input(INPUT_POST,'state',FILTER_SANITIZE_STRING);
      $zip = filter_input(INPUT_POST,'zip',FILTER_SANITIZE_STRING);


  } else {
    header('Location: /cart.php');
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
  <title>What the Duck? | World's Best Rubber Ducks</title>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
  
  <div class="wrapper">
    <h1>Order Summary</h1>
    <div class="box">
        <div class="alert success">
            <strong>Your order was submitted successfully!</strong>
        </div>
    <h2>Delivery Address:</h2>
    <p>
    <?php 
        echo $name;
        echo "<br>";
        echo $address1;
        if($address2 != "") {
            echo "<br>";
            echo $address2;
        }
        echo "<br>";
        echo $city . ", " . $state . " " . $zip;

    ?>

    </p>

    <h2>Order Contents:</h2>
    <table id="cart">
      <thead>
        <th>Image</th>
        <th>Product</th>
        <!-- <th>Quantity</th> -->
        <th>Subtotal</th>
      </thead>
      <tbody>
        <?php foreach($_SESSION['cart'] as $item): 
        $product = get_product($item['identifier'],$products);
        ?>
          <tr>
            <td>
              <div class="product-image-wrapper">
                <img class="product-image" src="<?php echo '/assets/images/products/'.$product['image_url']; ?>" />
              </div>
            </td>
            <td>
              <h2 class="product-name"><?php echo $product['name']; ?></h2>
              <p>Unit Price: $<?php echo number_format(($product['price'] /100), 2, '.', ',')?></p>
            </td>
            <td>
              <?php echo "$".number_format((($product['price']) /100), 2, '.', ','); ?></php>
            </td>
          </tr>

        <?php endforeach; ?>
          <tr>
            <td></td>
            <td class="text-right">TOTAL:</td>
            <td><?php echo $cart_total;?></td>
          </tr>
      </tbody>
    </table>
    
    </div>
  </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>

<?php 
    session_destroy();
?>