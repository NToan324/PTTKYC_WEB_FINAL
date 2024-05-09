<?php
include __DIR__ . '/../../models/viewdetailsproduct.php';
include __DIR__ . '/../../models/addcart.php';
$listthumbnail = getthumbnails();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="style.css">
    <title>Product</title>
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
                        <span class="quantity"><?php
                        if (isset($_SESSION['cart'])) {
                            $count = 0;
                            foreach ($_SESSION['cart'] as $product) {
                                $count += $product['quantity'];
                            }
                            echo $count;
                        } else {
                            echo 0;
                        }
                        ?></span>
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
        <div class="container-view-product">
            <div class="view-poduct-image">
                <div class="vp-image-secondary">
                    <?php
                    $index = 1;
                    foreach ($listthumbnail as $product): ?>
                        <?php if ($index == 1): ?>
                            <img src="<?php echo $product['thumbnailSec']; ?>" alt="hinh1" class="image-sec">
                        <?php elseif ($index == 2): ?>
                            <img src="<?php echo $product['thumbnailSec']; ?>" alt="hinh2" class="image-sec">
                        <?php elseif ($index == 3): ?>
                            <img src="<?php echo $product['thumbnailSec']; ?>" alt="hinh3" class="image-sec">
                        </div>
                        <img src="<?php echo $product['thumbnail']; ?>" alt="Hinh goc" id="image-main" class="image-main">
            </div>
            <div class="view-product-info">
                <div class="name-rate">
                    <h2 class="product-name"><?php echo $product['title']; ?></h2>
                    <div class="rate-five-star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <p class="product-price"><?php echo number_format($product['price'], 0, ',','.'); ?>đ</p>
                <div class="choose-color">
                    <p>Màu sắc</p>
                    <div class="color">
                        <div class="color-1"></div>
                        <div class="color-2"></div>
                        <div class="color-3"></div>
                    </div>
                </div>
                <div class="description">
                    <div class="description-name">
                        <p id="material">Chất liệu</p>
                        <p id="shipping">Giao hàng</p>
                        <p id="returnOrder">Hoàn trả</p>
                    </div>
                    <p id="content"><?php echo $product['material']; ?></p>
                </div>
                <div class="quantity-add">
                    <div class="quantity-choose">
                        <button id="decrease">-</button>
                        <input type="text" value="1" id="procId">
                        <button id="increase">+</button>
                    </div>
                    <form action="/PTTKYC_WEB_FINAL/src/models/addcart.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                        <input type="hidden" name="title" value="<?php echo $product['title'];?>">
                        <input type="hidden" name="thumbnail" value="<?php echo $product['thumbnail'];?>">
                        <input type="hidden" name="price" value="<?php echo  number_format($product['price'], '0', ',','.');?>">
                        <button type="submit" name="addtocartView" value="Thêm giỏ hàng" class="btn-add">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-product-description">
            <div class="title-description">
                <p>Mô tả sản phẩm</p>
                <p>Chính sách bảo hành</p>
                <p>Đánh giá</p>
            </div>
            <p><?php echo $product['description']; ?></p>
                <?php endif;
                        $index++; endforeach;
                    ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>