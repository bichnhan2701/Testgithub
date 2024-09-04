<?php
session_start();

if (isset($_POST['addToCart'])) {
    // session_destroy();
    $masp = $_GET['id'];
    $soluong = 1; 

    $sql = "SELECT * FROM sanpham WHERE idProduct = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $masp]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $new_product[] = array(
            'idProduct' => $product['idProduct'],
            'nameProduct' => $product['nameProduct'],
            'price' => $product['price'],
            'quantity' => $soluong,
            'img' => $product['img_poster1'],
            'id' => $masp
        );

        if (isset($_SESSION['cart'])) {
            $found = false;

            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['idProduct'] == $masp) {
                    $product[] = array(
                        'idProduct' => $cart_item['idProduct'],
                        'nameProduct' => $cart_item['nameProduct'],
                        'price' => $cart_item['price'],
                        'quantity' => $soluong,
                        'img' => $cart_item['img_poster1'],
                        'id' => $cart_item['id']
                    );
                    $found = true;
                } else {
                    $product[] = array(
                        'idProduct' => $cart_item['idProduct'],
                        'nameProduct' => $cart_item['nameProduct'],
                        'price' => $cart_item['price'],
                        'quantity' => $cart_item['quantity'],
                        'img' => $cart_item['img_poster1'],
                        'id' => $cart_item['id']
                    );
                }
            }

            if (!$found) { 
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    
    }
    header('Location: ../../project/page/cart.php');
}
?>