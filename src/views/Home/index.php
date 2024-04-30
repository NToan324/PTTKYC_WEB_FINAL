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
    <title>Home</title>
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
                    <button><i class="fa-solid fa-cart-shopping"></i></button>
                </div>
                <nav>
                    <ul>
                        <li><a href="/PTTKYC_WEB_FINAL/src/views/Home/index.php">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a></li>
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
        <div class="container-page1">
            <div class="container-introduction">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/intro-bg.png" alt="intro background" class="img-intro-bg">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/intro-left.png" alt="intro left" class="img-intro-left">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/intro-right.png" alt="intro right" class="img-intro-right">
                <h1>Shop everything you need <br> online from the Japan <br> businesses <h1 class="h1-intro-gradient">you love</h1> </h1>
            </div>
            <div class="container-description">
                <div class="cd-box1">
                    <div class="box1-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h3> +15K<p>Product Reviews </p></h3>
                    <h2>Real idetity - verified reviews you can just</h2>
                </div>
                <div class="cd-box2">
                    <div class="box2-child">
                        <p>Quality products <br> from local <br> businesses</p>
                    </div>
                    <div class="box2-child"></div>
    
                </div>
                <div class="cd-box3">
                    <div class="box3-child-circle">
                        <img src="/PTTKYC_WEB_FINAL/storage/Image/bcc-1.jpg" alt="bcc-1">
                        <img src="/PTTKYC_WEB_FINAL/storage/Image/bcc-2.jpg" alt="bcc-2">
                        <img src="/PTTKYC_WEB_FINAL/storage/Image/bcc-3.jpg" alt="bcc-3">
                        <img src="/PTTKYC_WEB_FINAL/storage/Image/bcc-4.jpg" alt="bcc-4">
                    </div>
                    <p>4,947+ <br> Certified Branchs</p>
                </div>
                <div class="cd-box4">
                    <h1>10%+<p>Up to 10% back on all purchases</p></h1>
                    <i class="fa-regular fa-clock"></i>
                    <p>Free, fast, and reliable, shipping</p>
                </div>
                <div class="cd-box5">
                    <p>Check out to see more details about Japan House</p>
                    <div class="details">
                        <p>Learn more</p>
                        <a href="#">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="cd-box6">
                    <a href="#">Mua sắm sản phẩm tại đây</a>
                </div>
            </div>
        </div>
        <div class="container-page2">
            <div class="container-product">
                <div class="container-product-header">
                    <p class="title">KHÁM PHÁ <br> SẢN PHẨM</p>
                    <p> "Nơi mà bạn có thể tìm thấy <br> mọi thứ mình cần từ đồ điện tử, thực phẩm <br> đến đồ trang sức và đồ dùng gia đình <br> uy tín hàng nội địa Nhật"</p>
                </div>
                <div class="cp-box">
                    <div class="cp-box-child-left">
                        <div class="cp-box-child-1">
                            <div class="view-cp-box-child-1">
                                <p>Bạn đam mê thể thao?</p>
                            </div>
                            <div class="btn-view-cp">
                                <a href="#">Xem thêm</a>
                            </div>
                            <img src="/PTTKYC_WEB_FINAL/storage/Image/cp-box-child-1.png" alt="cp-box-child-1">
                        </div>
                        <div class="cp-box-child-2">
                            <p>Tôi thích bơi lội <br> Còn bạn thì sao?</p>
                            <div class="btn-buy-cp">
                                <a href="#">Mua ngay</a>
                            </div>
                            <img src="/PTTKYC_WEB_FINAL/storage/Image/cp-box-child-2.png" alt="cp-box-child-2">
                        </div>
                        <div class="cp-box-child-3">
                            <div class="show-product-cp">
                                <img src="/PTTKYC_WEB_FINAL/storage/Image/cp-box-child-3.png" alt="cp-box-child-3">
                                <div class="info-product-cp">
                                    <div class="name-product">
                                        <h3>Đèn học</h3>
                                        <a href="#">Mua ngay</a>
                                    </div>
                                    <div class="price-product">
                                        <p>299.000đ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tag-product-cp">
                                <div class="list-tag-product-cp">
                                    <p>Quần áo</p>
                                    <p>Phụ kiện</p>
                                    <p>Baby</p>
                                    <p>Glasses</p>
                                    <p>Văn phòng</p>
                                    <p>Đồ thủ công</p>
                                    <p>Mỹ phẩm</p>
                                </div>
                                <a href="#">Xem danh mục sản phẩm</a>
                            </div>
                        </div>
                    </div>
                  
                    <div class="cp-box-child-right">
                        <div class="cp-box-child-right-1">
                            <div class="show-product-cp">
                                <img src="/PTTKYC_WEB_FINAL/storage/Image/camera-green.png" alt="cp-box-child-4">
                                <div class="info-product-cp">
                                    <div class="name-product">
                                        <h3>Máy ảnh</h3>
                                        <a href="#">Mua ngay</a>
                                    </div>
                                    <div class="price-product">
                                        <p>999.000đ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="show-product-cp">
                                <img src="/PTTKYC_WEB_FINAL/storage/Image/hoodie.png" alt="cp-box-child-4">
                                <div class="info-product-cp">
                                    <div class="name-product">
                                        <h3>Hoddie</h3>
                                        <a href="#">Mua ngay</a>
                                    </div>
                                    <div class="price-product">
                                        <p>349.000đ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cp-box-child-right-2">
                            <p>Tìm kiếm đồ nội thất <br> tốt nhất!</p>
                            <div class="btn-buy-right-cp">
                                <a href="#">Mua ngay</a>
                            </div>
                            <img src="/PTTKYC_WEB_FINAL/storage/Image/chair.png" alt="cp-box-child-2">
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>