<?php include __DIR__ . '/../../models/addcart.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-logo">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/logo.png" alt="logo" class="logo">
                <h3>Japan House</h3>
            </div>
            <div class="header-search-navbar">
                <div class="header-search-cart">
                    <div class="search">
                        <input type="text" placeholder="Bạn muốn tìm gì ...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="cart-quantity">
                        <a href="/PTTKYC_WEB_FINAL/src/views/Cart/index.php"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        <span class="quantity">0</span>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li><a href="/PTTKYC_WEB_FINAL/src/views/Home/index.php">Trang chủ</a></li>
                        <li><a href="/PTTKYC_WEB_FINAL/src/views/Product/index.php">Sản phẩm</a></li>
                        <li><a href="#">Giảm giá</a></li>
                        <li><a href="#">Yêu thích</a></li>
                        <li><a href="#">Xem gần đây</a></li>
                    </ul>
                </nav>
            </div>
            <div class="info-signout">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/avatar.jpg" alt="avatar">
                <p>Nhật Toàn</p>
                <i class="fa-solid fa-chevron-down" id="icon-down"></i>
                <div class="alert-signout" id="alert-signout">
                    <div class="overlay"></div>
                    <div class="logout-notification">
                        <p>Bạn có chắc chắn muốn đăng xuất?</p>
                        <button class="logout-btn" id="confirm-signout">Đăng Xuất</button>
                        <button class="cancel-btn" id="cancel-signout">Hủy</button>
                    </div>
                </div>

            </div>
        </header>
        <div class="container-title-cart">
            <p>Giỏ hàng</p>
            <a href="/PTTKYC_WEB_FINAL/src/views/Product/index.php" class="back-to-shopping">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Quay lại mua sắm</span>
            </a>
        </div>
        <div class="container-product-cart">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $sp):
                        ?>
                        <tr>
                            <td>
                                <div class="product-cart">
                                    <div class="frame-img">
                                        <img src="<?php echo $sp['thumbnail'] ?>" alt="product">
                                    </div>
                                    <div class="product-info">
                                        <p class="name-product"><?php echo $sp['title'];?></p>
                                        <p class="id-product">#<?php echo $sp['id'];?></p>
                                        <p class="color-product">Màu sắc: Xanh lá</p>
                                        <p class="size-product">Kích cỡ: M</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="price-component">
                                    <p class="price-product"><?php echo $sp['price']; ?>đ</p>
                                    <p class="shipping-product">Free Ship</p>
                                    <p class="voucher-product">Giảm giá: 20.000đ</p>
                                </div>
                            </td>
                            <td>
                                <div class="quantity">
                                    <button class="decrease">-</button>
                                    <input type="text" value="<?php echo $sp['quantity'];?>">
                                    <button class="increase">+</button>
                                </div>
                            </td>
                            <td class="total-product">180.000đ</td>
                            <td>
                                <i class="fa-solid fa-trash delete-product"
                                    data-product-id="<?php echo $sp['id'];?>"></i>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ; ?>
            </table>
        </div>
        <div class="container-shipping-mode">
            <div class="shipping-mode">
                <p>Chọn hình thức giao hàng</p>
                <div class="shipping-mode-option">
                    <div class="shipping-mode-item">
                        <input type="radio" name="shipping-mode" id="normal" checked>
                        <label for="normal">Giao hàng tiêu chuẩn (2 - 4 ngày)</label>
                    </div>
                    <div class="shipping-mode-item">
                        <input type="radio" name="shipping-mode" id="fast">
                        <label for="fast">Giao hàng nhanh (1 - 3 ngày)</label>
                    </div>
                </div>
            </div>
            <div class="total-price-shipping">
                <div class="total-price">
                    <p>Tổng tiền hàng</p>
                    <p>679.000đ</p>
                </div>
                <div class="shipping-price">
                    <p>Phí vận chuyển</p>
                    <p>Free</p>
                </div>
                <div class="total-price">
                    <p>Tổng tiền thanh toán</p>
                    <p>679.000đ</p>
                </div>
                <button>
                    <span>Tiến hành thanh toán</span>
                </button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>

</body>

</html>

<?php
// Kiểm tra xem request có phải là POST và tồn tại 'deletedId' hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletedId'])) {
    // Nhận ID sản phẩm đã xóa từ request
    $deletedId = $_POST['deletedId'];

    // Thực hiện xóa sản phẩm có ID là $deletedId khỏi giỏ hàng trong session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['id'] == $deletedId) {
                unset($_SESSION['cart'][$key]);
                // Thực hiện các hành động khác nếu cần
                echo "Xóa sản phẩm có ID $deletedId thành công!";
                break;
            }
        }
    } else {
        // Không tìm thấy sản phẩm trong giỏ hàng
        echo "Không tìm thấy sản phẩm có ID $deletedId trong giỏ hàng!";
    }
}
?>