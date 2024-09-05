<?php
    session_start();
?>
<p>Giỏ hàng</p>
<?php
    print_r($_SESSION['cart']); // Print the cart for debugging
?>