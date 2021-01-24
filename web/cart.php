<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/session.php';
  

  if(isset($_POST['action'])) {
    $return_id = "";
    switch($_POST['action']) {
      case 'add':
        // HANDLE ADD TO CART
        // $quantity = filter_input(INPUT_POST,'quantity',FILTER_VALIDATE_INT);
        $identifier = filter_input(INPUT_POST,'product',FILTER_SANITIZE_STRING);
        $return_id = $identifier;
        $product = get_product($identifier, $products);
        if($product) {
          $cart_item = [
            'identifier' => $identifier
            // 'quantity' => $quantity
          ];
          array_push($_SESSION['cart'],$cart_item);
        }
        break;
      case 'remove':
        $identifier = filter_input(INPUT_POST,'identifier',FILTER_SANITIZE_STRING);
        $products_key = array_search($identifier, array_column($_SESSION['cart'], 'identifier'));
        if($products_key !== false) {
          array_splice($_SESSION['cart'],$products_key,1);
        }
        break;
      // case 'update':
      //   echo "update quantities";
      //   break;
    }

    header('Location: /cart.php?id='.$return_id);
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
    <h1>Shopping Cart</h1>
    <div class="box">
    <table id="cart">
      <thead>
        <th></th>
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
              <form action="/cart.php" method="post">
                <input type="hidden" name="action" value="remove">
                <input type="hidden" name="identifier" value="<?php echo $item['identifier'] ?>">
                <button class="button"><i class="fas fa-times-circle"></i></button>
              </form>
            </td>
            <td>
              <div class="product-image-wrapper">
                <img class="product-image" src="<?php echo '/assets/images/products/'.$product['image_url']; ?>" />
              </div>
            </td>
            <td>
              <h2 class="product-name"><?php echo $product['name']; ?></h2>
              <p>Unit Price: $<?php echo number_format(($product['price'] /100), 2, '.', ',')?></p>
            </td>
            <!-- <td>
              <input class="quantity" id="<?php echo $product['identifier']; ?>-quantity" type="number" name="quantity" value="<?php echo $item['quantity'];?>" />
            </td> -->
            <td>
              <?php echo "$".number_format((($product['price']) /100), 2, '.', ','); ?></php>
            </td>
          </tr>

        <?php endforeach; ?>
          <tr>
            <td></td>
            <td></td>
            <!-- <td></td> -->
            <td class="text-right">TOTAL:</td>
            <td><?php echo $cart_total;?></td>
          </tr>
      </tbody>
    </table>
    <p class="text-right">
    <!-- <a class="button">Update Quantities</a>  -->
    <a class="button" href="/index.php<?php if(isset($_GET['id'])){ echo "#" . $_GET['id'];}?>">Continue Shopping</a>
    <?php if($cart_total != "$0.00"): ?>
    <a class="button btn-primary" href="/checkout.php"> Checkout <i class="fas fa-check"></i></a>
    <?php endif; ?>
    </p>
    
    </div>
  </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>