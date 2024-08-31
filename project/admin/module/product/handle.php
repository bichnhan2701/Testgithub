<?php
    include("../../../component/connect/config.php");
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['quantityType'])) {
        $masp = $_POST['idType'];
        $tensp = $_POST['idType'];
        $maloai = $_POST['idType'];
        $tenloai = $_POST['nameType'];
        $soluong = $_POST['quantityType'];
    }

    if (isset($_POST['addType'])) {
        // Add new category
        $sql_add = "INSERT INTO loaisanpham (idType, nameType, quantityType) VALUES (:idType, :nameType, :quantityType)";
        $stmt = $conn->prepare($sql_add);
        $stmt->bindParam(':idType', $maloai);
        $stmt->bindParam(':nameType', $tenloai);
        $stmt->bindParam(':quantityType', $soluong);
        
        if ($stmt->execute()) {
            echo "Thêm thành công.";
        } else {
            echo "Lỗi.";
        }

        header('Location:../../../admin/index.php?page=quanlydanhmuc&query=add');
        exit();
    } elseif (isset($_POST['modifyType'])) {
        // Modify an existing category
        if (isset($_GET['idType'])) {
            $id = $_GET['idType'];
            $sql_update = "UPDATE loaisanpham 
                        SET idType = :newIdType, nameType = :nameType, quantityType = :quantityType    
                        WHERE idType = :idType";
            $stmt = $conn->prepare($sql_update);
            $stmt->bindParam(':newIdType', $maloai);
            $stmt->bindParam(':nameType', $tenloai);
            $stmt->bindParam(':quantityType', $soluong);
            $stmt->bindParam(':idType', $id);
    
            if ($stmt->execute()) {
                echo "Sửa thành công.";
            } else {
                echo "Lỗi.";
            }
        }
        header('Location:../../../admin/index.php?page=quanlydanhmuc&query=add');
        exit();
    } else if (isset($_GET['idType'])) {
        // Delete a category
        $id = $_GET['idType'];
        $sql_delete = "DELETE FROM loaisanpham WHERE idType = :idType";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bindParam(':idType', $id);
    
        if ($stmt->execute()) {
            echo "Xóa thành công.";
        } else {
            echo "Lỗi.";
        }
    
        header('Location:../../../admin/index.php?page=quanlydanhmuc&query=add');
        exit();
    }
?>