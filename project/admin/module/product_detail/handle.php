<?php
include("../../../component/connect/config.php");

$masp = $_POST['idProduct'] ?? null;
$motatongquan = $_POST['describeProduct'] ?? null;
$motachitiet = $_POST['descDetail'] ?? null;
$thanhphan = $_POST['ingredient'] ?? null;
$motabangmau = $_POST['descColorTable'] ?? null;
$motasoluongmau = $_POST['descColorQuantity'] ?? null;
$motamau1 = $_POST['descColor1'] ?? null;
$motamau2 = $_POST['descColor2'] ?? null;
$motamau3 = $_POST['descColor3'] ?? null;
$motamau4 = $_POST['descColor4'] ?? null;

// Handle images
$img_color1 = $_FILES['img_color1']['name'] ?? null;
$img_hover_color1 = $_FILES['img_hover_color1']['name'] ?? null;
$img_color2 = $_FILES['img_color2']['name'] ?? null;
$img_hover_color2 = $_FILES['img_hover_color2']['name'] ?? null;
$img_color3 = $_FILES['img_color3']['name'] ?? null;
$img_hover_color3 = $_FILES['img_hover_color3']['name'] ?? null;
$img_color4 = $_FILES['img_color4']['name'] ?? null;
$img_hover_color4 = $_FILES['img_hover_color4']['name'] ?? null;
$img_colorTable = $_FILES['img_colorTable']['name'] ?? null;
$img_inf = $_FILES['img_inf']['name'] ?? null;

function uploadImage($file, $destination)
{
    if (isset($file) && isset($file['error']) && $file['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($file['tmp_name'], $destination);
        return true;
    }
    return false;
}

if (isset($_POST['addProductDetail'])) {
    // Add new product
    $sql_add = "INSERT INTO chitietsanpham (idProduct, describeProduct, descDetail, ingredient, descColorTable, descColorQuantity, 
                desc_color1, img_color1, img_hover_color1, desc_color2, img_color2, img_hover_color2, desc_color3, img_color3, 
                img_hover_color3,  desc_color4, img_color4, img_hover_color4, img_colorTable, img_inf) 
                VALUES (:idProduct, :describeProduct, :descDetail, :ingredient, :descColorTable, :descColorQuantity, 
                :descColor1, :img_color1, :img_hover_color1, :descColor2, :img_color2, :img_hover_color2, :descColor3, :img_color3, 
                :img_hover_color3,  :descColor4, :img_color4, :img_hover_color4, :img_colorTable, :img_inf)";
    $stmt = $conn->prepare($sql_add);

    // Bind parameters using variables
    $stmt->bindParam(':idProduct', $masp);
    $stmt->bindParam(':describeProduct', $motatongquan);
    $stmt->bindParam(':descDetail', $motachitiet);
    $stmt->bindParam(':ingredient', $thanhphan);
    $stmt->bindParam(':descColorTable', $motabangmau);
    $stmt->bindParam(':descColorQuantity', $motasoluongmau);
    $stmt->bindParam(':descColor1', $motamau1);
    $stmt->bindParam(':img_color1', $img_color1);
    $stmt->bindParam(':img_hover_color1', $img_hover_color1);
    $stmt->bindParam(':descColor2', $motamau2);
    $stmt->bindParam(':img_color2', $img_color2);
    $stmt->bindParam(':img_hover_color2', $img_hover_color2);
    $stmt->bindParam(':descColor3', $motamau3);
    $stmt->bindParam(':img_color3', $img_color3);
    $stmt->bindParam(':img_hover_color3', $img_hover_color3);
    $stmt->bindParam(':descColor4', $motamau4);
    $stmt->bindParam(':img_color4', $img_color4);
    $stmt->bindParam(':img_hover_color4', $img_hover_color4);
    $stmt->bindParam(':img_colorTable', $img_colorTable);
    $stmt->bindParam(':img_inf', $img_inf);

    $allUploaded = true;
    foreach ($_FILES as $key => $file) {
        if (isset($file) && !empty($file['name'])) {
            $uploaded = uploadImage($file, 'uploads/' . $file['name']);
            if (!$uploaded) {
                $allUploaded = false;
                echo "Error: Unable to upload file: $key.";
                exit();
            }
        }
    }

    if ($allUploaded && $stmt->execute()) {
        echo "Thêm thành công.";
    } else {
        echo "Lỗi khi thêm sản phẩm.";
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