<?php
    include("../../../component/connect/config.php");

    $masp = $_POST['idProduct'] ?? null;
    $motatongquan = $_POST['describeProduct'] ?? null;
    $motachitiet = $_POST['descDetail'] ?? null;
    $thanhphan = $_POST['ingredient'] ?? null;
    $motabangmau = $_POST['descColorTable'] ?? null;
    $motamau1 = $_POST['descColor1'] ?? null;
    $motamau2 = $_POST['descColor2'] ?? null;
    $motamau3 = $_POST['descColor3'] ?? null;
    $motamau4 = $_POST['descColor4'] ?? null;

    // Handle images
    $anhmau1 = $_FILES['img_color1']['name'] ?? null;
    $anhmau1_tmp = $_FILES['img_color1']['tmp_name'] ?? null;

    $anhhovermau1 = $_FILES['img_hover_color1']['name'] ?? null;
    $anhhovermau1_tmp = $_FILES['img_hover_color1']['tmp_name'] ?? null;

    $anhmau2 = $_FILES['img_color2']['name'] ?? null;
    $anhmau2_tmp = $_FILES['img_color2']['tmp_name'] ?? null;

    $anhhovermau2 = $_FILES['img_hover_color2']['name'] ?? null;
    $anhhovermau2_tmp = $_FILES['img_hover_color2']['tmp_name'] ?? null;

    $anhmau3 = $_FILES['img_color3']['name'] ?? null;
    $anhmau3_tmp = $_FILES['img_color3']['tmp_name'] ?? null;

    $anhhovermau3 = $_FILES['img_hover_color3']['name'] ?? null;
    $anhhovermau3_tmp = $_FILES['img_hover_color3']['tmp_name'] ?? null;

    $anhmau4 = $_FILES['img_color4']['name'] ?? null;
    $anhmau4_tmp = $_FILES['img_color4']['tmp_name'] ?? null;

    $anhhovermau4 = $_FILES['img_hover_color4']['name'] ?? null;
    $anhhovermau4_tmp = $_FILES['img_hover_color4']['tmp_name'] ?? null;

    $anhbangmau = $_FILES['img_colorTable']['name'] ?? null;
    $anhbangmau_tmp = $_FILES['img_colorTable']['tmp_name'] ?? null;

    $anhthongtin = $_FILES['img_inf']['name'] ?? null;
    $anhthongtin_tmp = $_FILES['img_inf']['tmp_name'] ?? null;

    $anhthanhphan = $_FILES['img_ingredient']['name'] ?? null;
    $anhthanhphan_tmp = $_FILES['img_ingredient']['tmp_name'] ?? null;

    if (isset($_POST['addProductDetail'])) {
        // Add new product
        $sql_add = "INSERT INTO chitietsanpham (idProduct, describeProduct, descDetail, ingredient, descColorTable,  
                        descColor1, img_color1, img_hover_color1, descColor2, img_color2, img_hover_color2, descColor3, img_color3, 
                        img_hover_color3,  descColor4, img_color4, img_hover_color4, img_colorTable, img_inf, img_ingredient) 
                    VALUES (:idProduct, :describeProduct, :descDetail, :ingredient, :descColorTable,
                        :descColor1, :img_color1, :img_hover_color1, :descColor2, :img_color2, :img_hover_color2, :descColor3, :img_color3, 
                        :img_hover_color3,  :descColor4, :img_color4, :img_hover_color4, :img_colorTable, :img_inf, :img_ingredient)";
        $stmt = $conn->prepare($sql_add);
        $stmt->bindParam(':idProduct', $masp);
        $stmt->bindParam(':describeProduct', $motatongquan);
        $stmt->bindParam(':descDetail', $motachitiet);
        $stmt->bindParam(':ingredient', $thanhphan);
        $stmt->bindParam(':descColorTable', $motabangmau);
        $stmt->bindParam(':descColor1', $motamau1);
        $stmt->bindParam(':img_color1', $anhmau1);
        $stmt->bindParam(':img_hover_color1', $anhhovermau1);
        $stmt->bindParam(':descColor2', $motamau2);
        $stmt->bindParam(':img_color2', $anhmau2);
        $stmt->bindParam(':img_hover_color2', $anhhovermau2);
        $stmt->bindParam(':descColor3', $motamau3);
        $stmt->bindParam(':img_color3', $anhmau3);
        $stmt->bindParam(':img_hover_color3', $anhhovermau3);
        $stmt->bindParam(':descColor4', $motamau4);
        $stmt->bindParam(':img_color4', $anhmau4);
        $stmt->bindParam(':img_hover_color4', $anhhovermau4);
        $stmt->bindParam(':img_colorTable', $anhbangmau);
        $stmt->bindParam(':img_inf', $anhthongtin);
        $stmt->bindParam(':img_ingredient', $anhthanhphan);
        
        if ($anhmau1_tmp && $anhmau2_tmp && $anhmau3_tmp && $anhmau4_tmp && $anhhovermau1_tmp && $anhhovermau2_tmp 
            && $anhhovermau3_tmp && $anhhovermau4_tmp && $anhbangmau_tmp && $anhthongtin_tmp && $anhthanhphan_tmp) {
            move_uploaded_file($anhmau1_tmp, 'uploads/' . $anhmau1);
            move_uploaded_file($anhmau2_tmp, 'uploads/' . $anhmau2);
            move_uploaded_file($anhmau3_tmp, 'uploads/' . $anhmau3);
            move_uploaded_file($anhmau4_tmp, 'uploads/' . $anhmau4);
            move_uploaded_file($anhhovermau1_tmp, 'uploads/' . $anhhovermau1);
            move_uploaded_file($anhhovermau2_tmp, 'uploads/' . $anhhovermau2);
            move_uploaded_file($anhhovermau3_tmp, 'uploads/' . $anhhovermau3);
            move_uploaded_file($anhhovermau4_tmp, 'uploads/' . $anhhovermau4);
            move_uploaded_file($anhbangmau_tmp, 'uploads/' . $anhbangmau);
            move_uploaded_file($anhthongtin_tmp, 'uploads/' . $anhthongtin);
            move_uploaded_file($anhthanhphan_tmp, 'uploads/' . $anhthanhphan);
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
        if (isset($_GET['idProduct'])) {
            $id = $_GET['idProduct'];
    
            $sql_update = "UPDATE chitietsanpham 
                           SET idProduct = :newIdProduct, describeProduct = :describeProduct, descDetail = :descDetail, 
                            ingredient = :ingredient, descColorTable = :descColorTable, descColor1 = :descColor1,
                            descColor2 = :descColor2, descColor3 = :descColor3, descColor4 = :descColor4";
    
            if ($anhmau1) { $sql_update .= ", img_color1 = :img_color1"; }
            if ($anhmau2) { $sql_update .= ", img_color2 = :img_color2"; }
            if ($anhmau3) { $sql_update .= ", img_color3 = :img_color3"; }
            if ($anhmau4) { $sql_update .= ", img_color4 = :img_color4"; }
            if ($anhhovermau1) { $sql_update .= ", img_hover_color1 = :img_hover_color1"; }
            if ($anhhovermau2) { $sql_update .= ", img_hover_color2 = :img_hover_color2"; }
            if ($anhhovermau3) { $sql_update .= ", img_hover_color3 = :img_hover_color3"; }
            if ($anhhovermau4) { $sql_update .= ", img_hover_color4 = :img_hover_color4"; }
            if ($anhbangmau) { $sql_update .= ", img_colorTable = :img_colorTable"; }
            if ($anhthongtin) { $sql_update .= ", img_inf = :img_inf"; }
            if ($anhthanhphan) { $sql_update .= ", img_ingredient = :img_ingredient"; }
    
            $sql_update .= " WHERE idProduct = :existingIdProduct";
    
            $stmt = $conn->prepare($sql_update);
            $stmt->bindParam(':newIdProduct', $masp);
            $stmt->bindParam(':describeProduct', $motatongquan);
            $stmt->bindParam(':descDetail', $motachitiet);
            $stmt->bindParam(':ingredient', $thanhphan);
            $stmt->bindParam(':descColorTable', $motabangmau);
            $stmt->bindParam(':descColor1', $motamau1);
            $stmt->bindParam(':descColor2', $motamau2);
            $stmt->bindParam(':descColor3', $motamau3);
            $stmt->bindParam(':descColor4', $motamau4);
            $stmt->bindParam(':existingIdProduct', $id);
    
            if ($anhmau1) { 
                $stmt->bindParam(':img_color1', $anhmau1);
                move_uploaded_file($anhmau1_tmp, 'uploads/' . $anhmau1);
            }
            if ($anhmau2) { 
                $stmt->bindParam(':img_color2', $anhmau2);
                move_uploaded_file($anhmau2_tmp, 'uploads/' . $anhmau2);
            }
            if ($anhmau3) { 
                $stmt->bindParam(':img_color3', $anhmau3);
                move_uploaded_file($anhmau3_tmp, 'uploads/' . $anhmau3);
            }
            if ($anhmau4) { 
                $stmt->bindParam(':img_color4', $anhmau4);
                move_uploaded_file($anhmau4_tmp, 'uploads/' . $anhmau4);
            }
            if ($anhhovermau1) { 
                $stmt->bindParam(':img_hover_color1', $anhhovermau1);
                move_uploaded_file($anhhovermau1_tmp, 'uploads/' . $anhhovermau1);
            }
            if ($anhhovermau2) { 
                $stmt->bindParam(':img_hover_color2', $anhhovermau2);
                move_uploaded_file($anhhovermau2_tmp, 'uploads/' . $anhhovermau2);
            }
            if ($anhhovermau3) { 
                $stmt->bindParam(':img_hover_color3', $anhhovermau3);
                move_uploaded_file($anhhovermau3_tmp, 'uploads/' . $anhhovermau3);
            }
            if ($anhhovermau4) { 
                $stmt->bindParam(':img_hover_color4', $anhhovermau4);
                move_uploaded_file($anhhovermau4_tmp, 'uploads/' . $anhhovermau4);
            }
            if ($anhbangmau) { 
                $stmt->bindParam(':img_colorTable', $anhbangmau);
                move_uploaded_file($anhbangmau_tmp, 'uploads/' . $anhbangmau);
            }
            if ($anhthongtin) { 
                $stmt->bindParam(':img_inf', $anhthongtin);
                move_uploaded_file($anhthongtin_tmp, 'uploads/' . $anhthongtin);
            }
            if ($anhthanhphan) { 
                $stmt->bindParam(':img_ingredient', $anhthanhphan);
                move_uploaded_file($anhthanhphan_tmp, 'uploads/' . $anhthanhphan);
            }
    
            if ($stmt->execute()) {
                echo "Sửa thành công.";
            } else {
                echo "Lỗi.";
            }
        }
        header('Location:../../../admin/index.php?page=quanlychitietsanpham&query=add');
        exit();
    } else if (isset($_GET['idProduct'])) {
        // Delete a category
        $id = $_GET['idProduct'];
        $sql = "SELECT * FROM chitietsanpham WHERE idProduct = :idProduct LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idProduct', $id);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            // Example: If you need to delete images from the server
            if (!empty($product['img_color1']) && file_exists('uploads/' . $product['img_color1'])) {
                unlink('uploads/' . $product['img_color1']);
            }
            if (!empty($product['img_color2']) && file_exists('uploads/' . $product['img_color2'])) {
                unlink('uploads/' . $product['img_color2']);
            }
            if (!empty($product['img_color3']) && file_exists('uploads/' . $product['img_color3'])) {
                unlink('uploads/' . $product['img_color3']);
            }
            if (!empty($product['img_color4']) && file_exists('uploads/' . $product['img_color4'])) {
                unlink('uploads/' . $product['img_color4']);
            }
            if (!empty($product['img_hover_color1']) && file_exists('uploads/' . $product['img_hover_color1'])) {
                unlink('uploads/' . $product['img_hover_color1']);
            }
            if (!empty($product['img_hover_color2']) && file_exists('uploads/' . $product['img_hover_color2'])) {
                unlink('uploads/' . $product['img_hover_color2']);
            }
            if (!empty($product['img_hover_color3']) && file_exists('uploads/' . $product['img_hover_color3'])) {
                unlink('uploads/' . $product['img_hover_color3']);
            }
            if (!empty($product['img_hover_color4']) && file_exists('uploads/' . $product['img_hover_color4'])) {
                unlink('uploads/' . $product['img_hover_color4']);
            }
            if (!empty($product['img_colorTable']) && file_exists('uploads/' . $product['img_colorTable'])) {
                unlink('uploads/' . $product['img_colorTable']);
            }
            if (!empty($product['img_inf']) && file_exists('uploads/' . $product['img_inf'])) {
                unlink('uploads/' . $product['img_inf']);
            }
            if (!empty($product['img_ingredient']) && file_exists('uploads/' . $product['img_ingredient'])) {
                unlink('uploads/' . $product['img_ingredient']);
            }
            
            // Delete the product from the database
            $sql_delete = "DELETE FROM chitietsanpham WHERE idProduct = :idProduct";
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
    
        header('Location:../../../admin/index.php?page=quanlychitietsanpham&query=add');
        exit();
    }
?>