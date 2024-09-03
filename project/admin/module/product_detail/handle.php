<?php
    include("../../../component/connect/config.php");
    $masp = $_POST['idProduct'] ?? null;
    $motatongquan = $_POST['describeProduct'] ?? null;
    $motachitiet = $_POST['descDetail'] ?? null;
    $thanhphan = $_POST['ingredient'] ?? null;
    $motabangmau = $_POST['descColorTable'] ?? null;
    $motasoluongmau = $_POST['descColorQuantity'] ?? null;
    $motamau1 = $_POST['desc_color1'] ?? null;
    $motamau2 = $_POST['desc_color2'] ?? null;
    $motamau3 = $_POST['desc_color3'] ?? null;
    $motamau4 = $_POST['desc_color4'] ?? null;
    //xu ly hinh anh
    $anhmau1 = $_FILES['img_color1']['name'] ?? null;
    $anhmau1_tmp = $_FILES['img_color1']['tmp_name'] ?? null;
    $anhmau2 = $_FILES['img_color2']['name'] ?? null;
    $anhmau2_tmp = $_FILES['img_color2']['tmp_name'] ?? null;
    $anhmau3 = $_FILES['img_color3']['name'] ?? null;
    $anhmau3_tmp = $_FILES['img_color3']['tmp_name'] ?? null;
    $anhmau4 = $_FILES['img_color4']['name'] ?? null;
    $anhmau4_tmp = $_FILES['img_color4']['tmp_name'] ?? null;
    
    $anhmau1hover = $_FILES['img_hover_color1']['name'] ?? null;
    $anhmau1hover_tmp = $_FILES['img_hover_color1']['tmp_name'] ?? null;
    $anhmau2hover = $_FILES['img_hover_color2']['name'] ?? null;
    $anhmau2hover_tmp = $_FILES['img_hover_color2']['tmp_name'] ?? null;
    $anhmau3hover = $_FILES['img_hover_color3']['name'] ?? null;
    $anhmau3hover_tmp = $_FILES['img_hover_color3']['tmp_name'] ?? null;
    $anhmau4hover = $_FILES['img_hover_color4']['name'] ?? null;
    $anhmau4hover_tmp = $_FILES['img_hover_color4']['tmp_name'] ?? null;
    
    $anhbangmau = $_FILES['img_colorTable']['name'] ?? null;
    $anhbangmau_tmp = $_FILES['img_colorTable']['tmp_name'] ?? null;
    $anhthongtin = $_FILES['img_inf']['name'] ?? null;
    $anhthongtin_tmp = $_FILES['img_inf']['tmp_name'] ?? null;
    

    if (isset($_POST['addProductDetail'])) {
        // Add new product
        $sql_add = "INSERT INTO chitietsanpham (idProduct, describeProduct, descDetail, ingredient, descColorTable, descColorQuantity, 
                    desc_color1, img_color1, img_hover_color1, desc_color2, img_color2, img_hover_color2, desc_color3, img_color3, 
                    img_hover_color3,  desc_color4, img_color4, img_hover_color4, img_colorTable, img_inf) 
                    VALUES (:idProduct, :describeProduct, :descDetail, :ingredient, :descColorTable, :descColorQuantity, 
                    :desc_color1, :img_color1, :img_hover_color1, :desc_color2, :img_color2, :img_hover_color2, :desc_color3, :img_color3, 
                    :img_hover_color3,  :desc_color4, :img_color4, :img_hover_color4, :img_colorTable, :img_inf)";
        $stmt = $conn->prepare($sql_add);
        $stmt->bindParam(':idProduct', $masp);
        $stmt->bindParam(':describeProduct', $motatongquan);
        $stmt->bindParam(':descDetail', $motachitiet);
        $stmt->bindParam(':ingredient', $thanhphan);
        $stmt->bindParam(':descColorTable', $motabangmau);
        $stmt->bindParam(':descColorQuantity', $motasoluongmau);
        $stmt->bindParam(':desc_color1', $motamau1);
        $stmt->bindParam(':img_color1', $anhmau1);
        $stmt->bindParam(':img_hover_color1', $anhmau1hover);
        $stmt->bindParam(':desc_color2', $motamau2);
        $stmt->bindParam(':img_color2', $anhmau2);
        $stmt->bindParam(':img_hover_color2', $anhmau2hover);
        $stmt->bindParam(':desc_color3', $motamau3);
        $stmt->bindParam(':img_color3', $anhmau3);
        $stmt->bindParam(':img_hover_color3', $anhmau3hover);
        $stmt->bindParam(':desc_color4', $motamau4);
        $stmt->bindParam(':img_color4', $anhmau4);
        $stmt->bindParam(':img_hover_color4', $anhmau4hover);
        $stmt->bindParam(':img_colorTable', $anhbangmau);
        $stmt->bindParam(':img_inf', $anhthongtin);
        
        if ($anhmau1_tmp && $anhmau2_tmp && $anhmau3_tmp && $anhmau4_tmp && $anhmau1hover_tmp && $anhmau2hover_tmp 
            && $anhmau3hover_tmp && $anhmau4hover_tmp && $anhbangmau_tmp && $anhthongtin_tmp) {
            move_uploaded_file($anhmau1_tmp, 'uploads/' . $anhmau1);
            move_uploaded_file($anhmau2_tmp, 'uploads/' . $anhmau2);
            move_uploaded_file($anhmau3_tmp, 'uploads/' . $anhmau3);
            move_uploaded_file($anhmau4_tmp, 'uploads/' . $anhmau4);
            move_uploaded_file($anhmau1hover_tmp, 'uploads/' . $anhmau1hover);
            move_uploaded_file($anhmau2hover_tmp, 'uploads/' . $anhmau2hover);
            move_uploaded_file($anhmau3hover_tmp, 'uploads/' . $anhmau3hover);
            move_uploaded_file($anhmau4hover_tmp, 'uploads/' . $anhmau4hover);
            move_uploaded_file($anhbangmau_tmp, 'uploads/' . $anhbangmau);
            move_uploaded_file($anhthongtin_tmp, 'uploads/' . $anhthongtin);
        } else {
            echo "Error: Files not uploaded.";
            exit();
        }

        if ($stmt->execute()) {
            echo "Thêm thành công.";
        } else {
            echo "Lỗi.";
        }

        header('Location:../../../admin/index.php?page=quanlychitietsanpham&query=add');
        exit();
    } else if (isset($_POST['modifyProductDetail'])) {
        // Modify an existing product
        
        header('Location:../../../admin/index.php?page=quanlychitietsanpham&query=add');
        exit();
    } else if (isset($_GET['idProduct'])) {
        // Delete a category
        
        header('Location:../../../admin/index.php?page=quanlychitietsanpham&query=add');
        exit();
    }
?>