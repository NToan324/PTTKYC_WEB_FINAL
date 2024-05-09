<?php
session_start();
if (isset($_POST["addtocart"]) && ($_POST["addtocart"]) || isset($_POST["buy"]) && ($_POST["buy"])) {
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
        // Buy now
    if(isset($_POST['buy'])) {
        header("Location: /PTTKYC_WEB_FINAL/src/views/Cart/index.php");
        exit();
    } else {
        header('Location: /PTTKYC_WEB_FINAL/src/views/Product/index.php');
        exit();
    }
}
?>