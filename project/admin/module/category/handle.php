<?php
    include("../../../component/connect/config.php");
    $maloai = $_POST['idType'];
    $tenloai = $_POST['nameType'];
    $soluong = $_POST['quantityType'];
    if (isset($_POST['addType'])) {
        $sql_add = "INSERT INTO loaisanpham(idType, nameType, quantityType) VALUES (:idType, :nameType, :quantityType)";
        
        $stmt = $conn->prepare($sql_add);
        $stmt->bindParam(':idType', $maloai);
        $stmt->bindParam(':nameType', $tenloai);
        $stmt->bindParam(':quantityType', $soluong);
        
        if ($stmt->execute()) {
            echo "Thêm thành công.";
        } else {
            echo "Lỗi.";
        }

        header('Location:../../../admin/index.php?page=quanlydanhmuc');
    } else if(isset($_GET['query']) == 'delete') {
        $id = $_GET['idType'];
        $sql_delete = "DELETE FROM loaisanpham WHERE idType = '".$id."'";

        $stmt = $conn->prepare($sql_delete);
        $stmt->bindParam(':idType', $maloai);
        $stmt->bindParam(':nameType', $tenloai);
        $stmt->bindParam(':quantityType', $soluong);
        
        if ($stmt->execute()) {
            echo "Xóa thành công.";
        } else {
            echo "Lỗi.";
        }

        header('Location:../../../admin/index.php?page=quanlydanhmuc');
    }
?>