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
    <h1>Checkout</h1>
    <div class="box">
    <form action="/success.php" method="post">
    <table>
        <tr>
            <td><label for="name">Full Name</label></td>
            <td><input type="text" name="name" id="name" required autofocus></td>
        </tr>
        <tr>
            <td><label for="address1">Address Line 1</label></td>
            <td><input type="text" name="address1" id="address1" required></td>
        </tr>
        <tr>
            <td><label for="address2">Address Line 2</label></td>
            <td><input type="text" name="address2" id="address2"></td>
        </tr>
        <tr>
            <td><label for="city">City</label></td>
            <td><input type="text" name="city" id="city" required></td>
        </tr>
        <tr>
            <td><label for="state">State</label></td>
            <td>
              <select name="state" id="state">
                  <option disabled selected>Select One</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                  </select>

            </td>
        </tr>
        <tr>
            <td><label for="zip">Zip Code</label></td>
            <td><input type="text" name="zip" id="zip" required></td>
        </tr>
        <tr>
          <td>Order Total</td>
          <td><?php echo $cart_total; ?></td>
        </tr>
    </table>
    <p class="text-right">
      <a href="/cart.php" class="button">Return to Cart</a>
      <input type="submit" class="button btn-primary" name="checkout" value="Submit Order" />
    </p>
    </form>
    </div>
  </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>