<?php
session_start();
if (isset($_SESSION['cart'])) {
    if (isset($_GET['id'])) {
        array_splice($_SESSION['cart'], $_GET['id'], 1);
        header('Location: /PTTKYC_WEB_FINAL/src/views/Cart/index.php');
    } else {
        echo "Không tìm thấy sản phẩm cần xóa";
        unset($_SESSION['cart']);
        header('Location: /PTTKYC_WEB_FINAL/src/views/Product/index.php');
    }
    if (count($_SESSION['cart']) > 0) {
        header('Location: /PTTKYC_WEB_FINAL/src/views/Cart/index.php');
    } else {
        header('Location: /PTTKYC_WEB_FINAL/src/views/Product/index.php');
    }
}
?>