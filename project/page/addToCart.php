<?php
session_start();
include("../../project/component/connect/config.php"); // Including PDO connection

// Function to update the product quantity in the database
function updateProductQuantity($conn, $user_id, $idProduct, $quantity) {
    $update_qty_sql = "UPDATE giohang SET soluong = :quantity WHERE user_id = :user_id AND idProduct = :idProduct";
    $update_qty_stmt = $conn->prepare($update_qty_sql);
    $update_qty_stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $update_qty_stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $update_qty_stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_STR);
    $update_qty_stmt->execute();
}

// Increase product quantity
if (isset($_SESSION['cart']) && isset($_GET['plus'])) {
    $user_id = $_SESSION['user_login']; // Assume user is logged in
    $id = $_GET['plus'];
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id) {
            if ($cart_item['quantity'] < 10) {
                $cart_item['quantity'] += 1;
                updateProductQuantity($conn, $user_id, $cart_item['idProduct'], $cart_item['quantity']); // Update DB
            }
        }
        $product[] = $cart_item;
    }

    $_SESSION['cart'] = $product;
    header('Location: ../../project/page/cart.php');
    exit();
}

// Decrease product quantity
if (isset($_SESSION['cart']) && isset($_GET['minus'])) {
    $user_id = $_SESSION['user_login'];
    $id = $_GET['minus'];
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id) {
            if ($cart_item['quantity'] > 1) {
                $cart_item['quantity'] -= 1;
                updateProductQuantity($conn, $user_id, $cart_item['idProduct'], $cart_item['quantity']); // Update DB
            }
        }
        $product[] = $cart_item;
    }

    $_SESSION['cart'] = $product;
    header('Location: ../../project/page/cart.php');
    exit();
}

// Remove a single product from the cart
if (isset($_SESSION['cart']) && isset($_GET['delete'])) {
    $user_id = $_SESSION['user_login'];
    $idProduct = $_GET['delete'];

    // Filter out the product to be deleted
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($cart_item) use ($idProduct) {
        return $cart_item['idProduct'] !== $idProduct; // Keep items that do not match the delete ID
    });

    // Remove product from the database cart (giohang table)
    $delete_sql = "DELETE FROM giohang WHERE user_id = :user_id AND idProduct = :idProduct";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $delete_stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_STR);
    $delete_stmt->execute();

    $_SESSION['message'] = "Product has been removed from the cart.";
    header('Location: ../../project/page/cart.php');
    exit();
}

// Clear all products from the cart
if (isset($_GET['deleteAll']) && $_GET['deleteAll'] == 1) {
    $user_id = $_SESSION['user_login'];

    // Clear cart in session
    unset($_SESSION['cart']);

    // Clear cart in the database
    $delete_all_sql = "DELETE FROM giohang WHERE user_id = :user_id";
    $delete_all_stmt = $conn->prepare($delete_all_sql);
    $delete_all_stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $delete_all_stmt->execute();

    $_SESSION['message'] = "Cart has been cleared.";
    header('Location: ../../project/page/cart.php');
    exit();
}

// Add a product to the cart
if (isset($_POST['addToCart'])) {
    if (!isset($_GET['id'])) {
        die("Error: Product ID is missing.");
    }

    $user_id = $_SESSION['user_login'];
    $masp = $_GET['id'];
    $soluong = 1;

    // Check if product exists in the database
    $sql = "SELECT * FROM chitietsanpham, sanpham WHERE sanpham.idProduct = chitietsanpham.idProduct AND sanpham.idProduct = :masp LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':masp', $masp, PDO::PARAM_STR);
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
                if ($cart_item['idProduct'] == $masp) { // Correct check for the same product
                    $cart_item['quantity'] += $soluong; // Increase quantity if product already in cart
                    updateProductQuantity($conn, $user_id, $masp, $cart_item['quantity']); // Update DB
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $_SESSION['cart'][] = $new_product; // Append new product to cart
                $insert_sql = "INSERT INTO giohang (user_id, idProduct, soluong) VALUES (:user_id, :idProduct, :soluong)";
                $insert_stmt = $conn->prepare($insert_sql);
                $insert_stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $insert_stmt->bindParam(':idProduct', $masp, PDO::PARAM_STR);
                $insert_stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
                $insert_stmt->execute();
            }
        } else {
            $_SESSION['cart'][] = $new_product; // Initialize cart with the first product
            $insert_sql = "INSERT INTO giohang (user_id, idProduct, soluong) VALUES (:user_id, :idProduct, :soluong)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $insert_stmt->bindParam(':idProduct', $masp, PDO::PARAM_STR);
            $insert_stmt->bindParam(':soluong', $soluong, PDO::PARAM_INT);
            $insert_stmt->execute();
        }

        echo "Product added to cart.<br>"; // Debugging output
    } else {
        echo "Error: Product not found in the database.";
    }

    header('Location: ../../project/page/cart.php');
    exit();
}
?>
