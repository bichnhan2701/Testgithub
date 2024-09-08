<?php
    session_start();
    include("../../project/component/connect/config.php"); // Including PDO connection
    //cong
    if (isset($_SESSION['cart']) && isset($_GET['plus'])) {
        $id = $_GET['plus'];
        $product = array();

        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] == $id) {
                if ($cart_item['quantity'] < 10) {
                    $cart_item['quantity'] += 1;
                }
            }
            $product[] = $cart_item;
        }

        $_SESSION['cart'] = $product;
        header('Location: ../../project/page/cart.php');
        exit();
    }
    //tru
    if (isset($_SESSION['cart']) && isset($_GET['minus'])) {
        $id = $_GET['minus'];
        $product = array();

        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] == $id) {
                if ($cart_item['quantity'] > 1) {
                    $cart_item['quantity'] -= 1;
                }
            }
            $product[] = $cart_item;
        }

        $_SESSION['cart'] = $product;
        header('Location: ../../project/page/cart.php');
        exit();
    }
    //xoa 1 san pham
    if (isset($_SESSION['cart']) && isset($_GET['delete'])) {
        $id = $_GET['delete'];
        // Filter out the product to be deleted
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($cart_item) use ($id) {
            return $cart_item['id'] !== $id; // Keep items that do not match the delete ID
        });

        $_SESSION['message'] = "Product has been removed from the cart.";
        header('Location: ../../project/page/cart.php');
        exit();
    }
    //xoa toan bo san pham
    if (isset($_GET['deleteAll']) && $_GET['deleteAll'] == 1) {
        unset($_SESSION['cart']);  // Correctly unset the cart
        $_SESSION['message'] = "Cart has been cleared.";  // Use session to store messages
        header('Location: ../../project/page/cart.php');  // Redirect without refresh
        exit();
    } 
    //them san pham
    if (isset($_POST['addToCart'])) {
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

        header('Location: ../../project/page/cart.php');
        exit(); // Ensure no further processing is done
    }
?>