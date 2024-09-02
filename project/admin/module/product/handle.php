<?php
    include("../../../component/connect/config.php");
    $masp = $_POST['idProduct'] ?? null;
    $tensp = $_POST['nameProduct'] ?? null;
    $maloai = $_POST['idType'] ?? null;
    // $tenloai = $_POST['nameType'] ?? null;
    $gia1 = $_POST['price'] ?? null;
    $gia2 = $_POST['price_del'] ?? null;
    $soluong = $_POST['quantity_product'] ?? null;
    //xu ly hinh anh
    $anh1 = $_FILES['img_poster1']['name'] ?? null;
    $anh1_tmp = $_FILES['img_poster1']['tmp_name'] ?? null;
    $anh2 = $_FILES['img_poster2']['name'] ?? null;
    $anh2_tmp = $_FILES['img_poster2']['tmp_name'] ?? null;
    

    if (isset($_POST['addProduct'])) {
        // Add new product
        $sql_add = "INSERT INTO sanpham (idProduct, nameProduct, idType, price, price_del, quantity_product, img_poster1, img_poster2) 
                    VALUES (:idProduct, :nameProduct, :idType, :price, :price_del, :quantity_product, :img_poster1, :img_poster2)";
        $stmt = $conn->prepare($sql_add);
        $stmt->bindParam(':idProduct', $masp);
        $stmt->bindParam(':nameProduct', $tensp);
        $stmt->bindParam(':idType', $maloai);
        $stmt->bindParam(':price', $gia1);
        $stmt->bindParam(':price_del', $gia2);
        $stmt->bindParam(':quantity_product', $soluong);
        $stmt->bindParam(':img_poster1', $anh1);
        $stmt->bindParam(':img_poster2', $anh2);
        
        if ($anh1_tmp && $anh2_tmp) {
            move_uploaded_file($anh1_tmp, 'uploads/' . $anh1);
            move_uploaded_file($anh2_tmp, 'uploads/' . $anh2);
        } else {
            echo "Error: Files not uploaded.";
            exit();
        }

        if ($stmt->execute()) {
            echo "Thêm thành công.";
        } else {
            echo "Lỗi.";
        }

        header('Location:../../../admin/index.php?page=quanlysanpham&query=add');
        exit();
    } else if (isset($_POST['modifyProduct'])) {
        // Modify an existing product
        if (isset($_GET['idProduct'])) {
            $id = $_GET['idProduct'];
    
            $sql_update = "UPDATE sanpham 
                           SET idProduct = :newIdProduct, nameProduct = :nameProduct, idType = :idType,  
                               price = :price, price_del = :price_del, quantity_product = :quantity_product";
    
            // Check if new images are uploaded and add to the query if so
            if ($anh1) {
                $sql_update .= ", img_poster1 = :img_poster1";  
            }
            if ($anh2) {
                $sql_update .= ", img_poster2 = :img_poster2"; 
            }
    
            $sql_update .= " WHERE idProduct = :idProduct";
    
            $stmt = $conn->prepare($sql_update);
            $stmt->bindParam(':newIdProduct', $masp);
            $stmt->bindParam(':nameProduct', $tensp);
            $stmt->bindParam(':idType', $maloai);
            $stmt->bindParam(':price', $gia1);
            $stmt->bindParam(':price_del', $gia2);
            $stmt->bindParam(':quantity_product', $soluong);
            $stmt->bindParam(':idProduct', $id);
    
            if ($anh1) {
                $stmt->bindParam(':img_poster1', $anh1);
                move_uploaded_file($anh1_tmp, 'uploads/' . $anh1);
            }
            if ($anh2) {
                $stmt->bindParam(':img_poster2', $anh2);
                move_uploaded_file($anh2_tmp, 'uploads/' . $anh2);
            }
    
            if ($stmt->execute()) {
                echo "Sửa thành công.";
            } else {
                echo "Lỗi.";
            }
        }
        header('Location:../../../admin/index.php?page=quanlysanpham&query=add');
        exit();
    } else if (isset($_GET['idProduct'])) {
        // Delete a category
        $id = $_GET['idProduct'];
        $sql = "SELECT * FROM sanpham WHERE idProduct = :idProduct LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idProduct', $id);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            // Example: If you need to delete images from the server
            if (!empty($product['img_poster1']) && file_exists('uploads/' . $product['img_poster1'])) {
                unlink('uploads/' . $product['img_poster1']);
            }
            if (!empty($product['img_poster2']) && file_exists('uploads/' . $product['img_poster2'])) {
                unlink('uploads/' . $product['img_poster2']);
            }
            
            // Delete the product from the database
            $sql_delete = "DELETE FROM sanpham WHERE idProduct = :idProduct";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bindParam(':idProduct', $id);
        
            if ($stmt_delete->execute()) {
                echo "Xóa thành công.";
            } else {
                echo "Lỗi.";
            }
        } else {
            echo "Product not found.";
        }
    
        header('Location:../../../admin/index.php?page=quanlysanpham&query=add');
        exit();
    }
?>