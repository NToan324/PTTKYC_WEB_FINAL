<?php
include __DIR__ . '/../../models/product.php';
include __DIR__ . '/../../models/addcart.php';
$listProduct = getProduct();
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
                        <a href="/PTTKYC_WEB_FINAL/src/views/Cart/index.php"><i class="fa-solid fa-cart-shopping"></i></a>
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
        <div class="container-advertise">
            <div class="advertise-img" id="advertise-img">
                <div class="advertise-info" id="advertise-info">
                    <p>Giảm ngay 30% với sản phẩm <br> Đồ gia dụng</p>
                    <a href="#" style="text-decoration: none" id="a-advertise-buy">Mua ngay</a>
                </div>
                <i class="fa-solid fa-arrow-right" id="icon-next" onclick="changSlide()" style="color: #fff;"></i>
                <i class="fa-solid fa-arrow-left" id="icon-back" onclick="changSlide()" style="color: #fff;"></i>
            </div>
        </div>
        <div class="container-classify">
            <div class="group-classify">
                <div class="classify">
                    <span>Loại sản phẩm
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">Sang trọng</a> </li>
                        <li> <a href="#">Đơn giản</a></li>
                        <li> <a href="#">Cổ điển</a></li>
                        <li> <a href="#">Cao cấp</a> </li>
                    </ul>
                </div>
                <div class="classify">
                    <span>Giá cả
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">Dưới 100,000đ</a> </li>
                        <li> <a href="#">100,000đ - 500,000đ</a></li>
                        <li> <a href="#">500,000đ - 1,000,000đ</a></li>
                        <li> <a href="#">Trên 1,000,000đ</a> </li>
                    </ul>
                </div>
                <div class="classify">
                    <span>Đánh giá
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">1 Sao</a> </li>
                        <li> <a href="#">2 Sao</a></li>
                        <li> <a href="#">3 Sao</a></li>
                        <li> <a href="#">4 Sao</a> </li>
                        <li> <a href="#">5 Sao</a> </li>
                    </ul>
                </div>
                <div class="classify">
                    <span>Màu sắc
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">Đỏ</a> </li>
                        <li> <a href="#">Xanh</a></li>
                        <li> <a href="#">Vàng</a></li>
                        <li> <a href="#">Trắng</a> </li>
                    </ul>
                </div>
                <div class="classify">
                    <span>Chất liệu
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">Gỗ</a> </li>
                        <li> <a href="#">Kim loại</a></li>
                        <li> <a href="#">Da</a></li>
                        <li> <a href="#">Vải</a> </li>
                    </ul>
                </div>
                <div class="classify">
                    <span>Giảm giá
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">Dưới 10%</a> </li>
                        <li> <a href="#">10% - 20%</a></li>
                        <li> <a href="#">20% - 30%</a></li>
                        <li> <a href="#">Trên 30%</a> </li>
                    </ul>
                </div>
                <div class="classify">
                    <span>Phân loại
                        <i class="fa-solid fa-sliders"></i>
                    </span>
                    <ul class="dropdown">
                        <li> <a href="#">Sang trọng</a> </li>
                        <li> <a href="#">Đơn giản</a></li>
                        <li> <a href="#">Cổ điển</a></li>
                        <li> <a href="#">Cao cấp</a> </li>
                    </ul>
                </div>
            </div>
            <div class="sortby classify">
                <span>Sắp xếp theo
                    <i class="fa-solid fa-chevron-down"></i>
                </span>
                <ul class="dropdown">
                    <li> <a href="#">Giá tăng dần</a> </li>
                    <li> <a href="#">Giá giảm dần</a></li>
                    <li> <a href="#">Mới nhất</a></li>
                    <li> <a href="#">Cũ nhất</a> </li>
                </ul>
            </div>
        </div>
        <div class="container-product">
            <?php foreach( $listProduct as $product ) : ?>
            <div class="item">
                <div class="frame-img">
                    <img src="<?php echo $product['thumbnail'];?>" alt="">
                </div>
                <a href="/PTTKYC_WEB_FINAL/src/views/ViewProduct/index.php?id=<?php echo $product['id']?>" class="description-item">
                    <div class="info-item">
                        <p class="name-item"><?php echo $product['title'];?></p>
                        <p><?php echo $product['descriptionShort'];?></p>
                        <div class="rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <p><?php echo number_format($product['price'], '0', ',','.');?>đ</p>
                </a>
                <div class="buy-item">
                    <form action="/PTTKYC_WEB_FINAL/src/models/addcart.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                        <input type="hidden" name="title" value="<?php echo $product['title'];?>">
                        <input type="hidden" name="thumbnail" value="<?php echo $product['thumbnail'];?>">
                        <input type="hidden" name="price" value="<?php echo  number_format($product['price'], '0', ',','.');?>">
                        <input type="submit" name="buy" value="Mua ngay" class="buy">
                        <input type="submit" name="addtocart" value="Thêm" class="add-to-cart">
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>