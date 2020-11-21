<main id="cart">
  <h2>Cart items</h2>
  
  <?php 
    if (isset($_SESSION["cart"])):
    $cart = $_SESSION["cart"];
    $cartItems = $cart->getItems();
    ?>
    
    
    <table>
    <tr>
      <th>Item</th>
      <th>Price</th>
      <th>Qty</th>
      <th></th>
    </tr>
    
    <?php foreach ($cartItems as $item):
      $productName = $item->getItemName();
      $price = sprintf('%01.2f', $item->getPrice());
      $productId = $item->getItemId();
      $qty = $item->getQuantity();
      ?>
      
      <tr>
        <td><?= $productName ?></td>
        <td><?= $price ?></td>
        <td><?= $qty ?></td>
        <td>
          <form action="view-cart.php" method="POST">
            <input type="submit" name="remove" value="Remove">
            <input type="hidden" value="<?=   $productId ?>" name="productId">
          </form>
        </td>
      </tr>
      
      <?php endforeach; ?>
    </table>
    

    <form action="checkout.php" method="POST">
      <input type="submit" name="checkout" value="Checkout">
    </form>
    <?php endif;
  ?> 
</main>