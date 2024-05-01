<?php
include __DIR__ . '/../../src/models/db.php';

function getProduct () {
    $conn = getdb();
    $sql = "SELECT * FROM products";
    $stmp = $conn->prepare($sql);
    $stmp->execute();
    // Lấy tất cả các dòng dữ liệu từ kết quả truy vấn
    $listProduct = $stmp->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $listProduct;
}
?>
