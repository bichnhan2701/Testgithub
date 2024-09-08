<?php
session_start();
include("../../project/component/connect/config.php"); // Including PDO connection
if (isset($_POST['buyNow'])) {
    // session_destroy();
    if (!isset($_GET['id'])) {
        die("Error: Product ID is missing.");
    }

    $masp = $_GET['id'];
    $soluong = 1;

    // Correct SQL query execution using PDO
    $sql = "SELECT * FROM chitietsanpham, sanpham WHERE sanpham.idProduct = chitietsanpham.idProduct AND sanpham.idProduct = :masp LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':masp', $masp, PDO::PARAM_STR); // Use PARAM_STR if idProduct is a string
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $new_product = array(
            'idProduct' => $product['idProduct'],
            'nameProduct' => $product['nameProduct'],
            'price' => $product['price'],
            'quantity' => $soluong,
            'img' => $product['img_poster1'],
            'id' => $masp
        );

        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as &$cart_item) {
                if ($cart_item['idProduct'] == $masp) { // Correct check for same product
                    $cart_item['quantity'] += $soluong; // Increase quantity if product already in cart
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $_SESSION['cart'][] = $new_product; // Append new product to cart
            }
        } else {
            $_SESSION['cart'][] = $new_product; // Initialize cart with the first product
        }

        echo "Product added to cart.<br>"; // Debugging output
    } else {
        echo "Error: Product not found in the database.";
    }

    header('Location: ../../project/page/checkout.php');
    exit(); // Ensure no further processing is done
    // print_r($_SESSION['cart']);
}
?>