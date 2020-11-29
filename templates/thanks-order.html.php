<main class="login-pages-wrapper">
  <?php 
    // print_r($this->_cartItems);
    if($orderId > 0): ?>   
      <p>Thank you, your order number is <?= $orderId ?></p>
    <?php else: ?>
      <p>Something went wrong and the order was not placed</p>
    <?php endif; ?>
    
    <p><a href="landing.php">'
      <button>Back to the start</button>
    </a></p>
</main>
