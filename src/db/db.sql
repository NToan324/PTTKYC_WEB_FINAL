-- Tạo cơ sở dữ liệu nếu chưa có
CREATE DATABASE IF NOT EXISTS register_japanhouse;

USE register_japanhouse;

CREATE TABLE USERS (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    code int(10),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE CATEGORY (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE PRODUCTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    discount DECIMAL(10, 2) NOT NULL,
    thumbnail VARCHAR(255),
    description TEXT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES CATEGORY(id)
);

-- Dữ liệu mẫu
INSERT INTO PRODUCTS (title, price, discount, thumbnail, description) VALUES
('Áo sơ mi nam trắng', 29.99, 5.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aosomi.png', 'Phong cách, thoáng mát.'),
('Quần jeans nam xanh đậm', 39.99, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/jeannamxanh.png', 'Chắc chắn, ôm sát.'),
('Áo khoác nam đen', 49.99, 10.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aokhoacnamden.png', 'Thời trang, ấm áp.'),
('Dép nữ hồng pastel', 19.99, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/depnuhong.png', 'Đơn giản, thoải mái.'),
('Áo thun nam đỏ', 14.99, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aothunnamdo.png', 'Mềm mại, phong cách.'),
('Túi xách nữ da màu nâu', 59.99, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/tuixachdamaunau.png', 'Thanh lịch, đa dụng.'),
('Áo polo nam xanh lá cây', 24.99, 3.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aopoloxanhla.png', 'Sporty, nhẹ nhàng.'),
('Quần short nam trắng', 19.99, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/quanshorttrang.png', 'Trẻ trung, phù hợp.');


CREATE TABLE DON_HANG (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    note TEXT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status INT DEFAULT 0
);
CREATE TABLE CHI_TIET_DON_HANG (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2),
    toal_money DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES DON_HANG(id),
    FOREIGN KEY (product_id) REFERENCES SAN_PHAM(id)
);