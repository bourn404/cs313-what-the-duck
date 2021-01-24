<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/session.php';
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
    <h1>Browse Products</h1>
    <div class="products">
      <?php foreach($products as $product): ?>
        <div id="<?php echo $product['identifier']; ?>" class="product">
          <div class="product-image-wrapper">
            <img class="product-image" src="<?php echo '/assets/images/products/'.$product['image_url']; ?>" />
            <h2 class="product-name"><?php echo $product['name']; ?></h2>
            <p class="product-price">$<?php echo number_format(($product['price'] /100), 2, '.', ',')?></p>
            <form action="/cart.php" method="post">
            <input type="hidden" name="product" value="<?php echo $product['identifier']; ?>" />
            <input type="hidden" name="action" value="add" />
            <!-- <label for="<?php echo $product['identifier']; ?>-quantity">Quantity: </label>
            <input class="quantity" id="<?php echo $product['identifier']; ?>-quantity" type="number" name="quantity" value="1" /> -->
            <input type="submit" class="btn-primary button" value="Add to Cart"> 
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>