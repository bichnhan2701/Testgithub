<?php
    include("../../../component/connect/config.php");
    $masp = $_POST['idProduct'];
    $tensp = $_POST['nameProduct'];
    $maloai = $_POST['idType'];
    $gia1 = $_POST['price'];
    $gia2 = $_POST['price_del'];
    $soluong = $_POST['quantity_product'];
    //xu ly hinh anh
    $anh1 = $_FILES['img_poster1']['name'];
    $anh1_tmp = $_FILES['img_poster1']['tmp_name'];
    $anh2 = $_FILES['img_poster2']['name'];
    $anh2_tmp = $_FILES['img_poster2']['tmp_name'];
    

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
    }  elseif (isset($_POST['modifyProduct'])) {
        // Modify an existing category
    //     if (isset($_GET['idType'])) {
    //         $id = $_GET['idType'];
    //         $sql_update = "UPDATE loaisanpham 
    //                     SET idType = :newIdType, nameType = :nameType, quantityType = :quantityType    
    //                     WHERE idType = :idType";
    //         $stmt = $conn->prepare($sql_update);
    //         $stmt->bindParam(':newIdType', $maloai);
    //         $stmt->bindParam(':nameType', $tenloai);
    //         $stmt->bindParam(':quantityType', $soluong);
    //         $stmt->bindParam(':idType', $id);
    
    //         if ($stmt->execute()) {
    //             echo "Sửa thành công.";
    //         } else {
    //             echo "Lỗi.";
    //         }
    //     }
    // header('Location:../../../admin/index.php?page=quanlydanhmuc&query=add');
    //     exit();
    } else if (isset($_GET['idProduct'])) {
        // Delete a category
        // $id = $_GET['idType'];
        // $sql_delete = "DELETE FROM loaisanpham WHERE idType = :idType";
        // $stmt = $conn->prepare($sql_delete);
        // $stmt->bindParam(':idType', $id);
    
        // if ($stmt->execute()) {
        //     echo "Xóa thành công.";
        // } else {
        //     echo "Lỗi.";
        // }
    
        // header('Location:../../../admin/index.php?page=quanlydanhmuc&query=add');
        // exit();
    }
?>