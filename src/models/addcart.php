<?php
session_start();
if (isset($_POST["addtocart"]) && ($_POST["addtocart"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $thumbnail = $_POST["thumbnail"];
    $price = $_POST["price"];
    $sp = array(
        "id" => $id,
        "title" => $title,
        "thumbnail" => $thumbnail,
        "price" => $price,
        "quantity" => 1
    );

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $product_exists = false;
    foreach ($_SESSION['cart'] as &$product) {
        if ($product['id'] == $id) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            $product['quantity']++;
            $product_exists = true;
            break;
        }
    }
    if (!$product_exists) {
        $_SESSION['cart'][] = $sp;
    }


    $flag = false;
    if (isset($_POST['productIncDec'])) {
        $procId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        foreach ($_SESSION['cart'] as &$product) {
            if ($product['id'] == $procId) {
                $flag = true;
                $product['quantity'] = $quantity;
            }
        }

        if ($flag) {
            $response = [
                'status' => 200,
                'status_type' => 'success',
                'message' => 'Quantity updated successfully'
            ];
            echo json_encode($response);
            return;
        } else {
            $response = [
                'status' => 500,
                'status_type' => 'error',
                'message' => 'Quantity update failed'
            ];
            echo json_encode($response);
            return;
        }
    }

    // Đảm bảo không có dòng code nào được gọi sau header
    header('Location: /PTTKYC_WEB_FINAL/src/views/Product/index.php');
}
?>