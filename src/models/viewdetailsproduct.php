<?php
include __DIR__ . '/../../src/models/db.php';
function getthumbnails () {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn = getdb();
        $sql = "SELECT *
            FROM DETAILSPRODUCT d 
            INNER JOIN PRODUCTS p ON d.product_id = p.id
            Where d.product_id = $id";
        $stmp = $conn->prepare($sql);
        $stmp->execute();
        // Lấy tất cả các dòng dữ liệu từ kết quả truy vấn
        $listthumbnail = $stmp->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $listthumbnail;
    }
}
?>
