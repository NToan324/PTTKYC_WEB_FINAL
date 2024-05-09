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
('Áo sơ mi nam trắng', 299000, 5.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aosomi.png', 'Phong cách, thoáng mát.'),
('Quần jeans nam xanh đậm', 399000, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/jeannamxanh.png', 'Chắc chắn, ôm sát.'),
('Áo khoác nam đen', 495000, 10.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aokhoacnamden.png', 'Thời trang, ấm áp.'),
('Dép nữ hồng pastel', 190000, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/depnuhong.png', 'Đơn giản, thoải mái.'),
('Áo thun nam đỏ', 159000, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aothunnamdo.png', 'Mềm mại, phong cách.'),
('Túi xách nữ da màu nâu', 599000, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/tuixachdamaunau.png', 'Thanh lịch, đa dụng.'),
('Áo polo nam xanh lá cây', 249000, 3.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/aopoloxanhla.png', 'Sporty, nhẹ nhàng.'),
('Quần short nam trắng', 199000, 0.00, '/PTTKYC_WEB_FINAL/storage/Image_Product/quanshorttrang.png', 'Trẻ trung, phù hợp.');

CREATE TABLE DETAILSPRODUCT (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    size VARCHAR(255),
    color VARCHAR(255),
    quantity INT,
    material TEXT,
    description TEXT,
    thumbnailSec VARCHAR(255),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES PRODUCTS(id)
);

--Dữ liệu mẫu
INSERT INTO DETAILSPRODUCT (product_id, size, color, quantity, material, description, thumbnailSec)
VALUES
    (1, 'M', 'Trắng', 10, '100% Cotton', 'Áo sơ mi nam trắng cổ điển, được làm từ vải cotton cao cấp mang lại cảm giác sảng khoái và thoải mái. Có cổ áo tròn, nút cài phía trước, và tay dài với cổ tay nút. Hoàn hảo cho các dịp chính thức hoặc mặc hàng ngày.','/PTTKYC_WEB_FINAL/storage/Image_Product/aotrang1.jpg'),
    (1, 'L', 'Trắng', 15, 'Hỗn hợp Cotton (60% Cotton, 40% Polyester)', 'Áo sơ mi nam trắng đa dụng được làm từ hỗn hợp cotton cho sự kết hợp giữa sự thoải mái và độ bền. Áo có cổ áo spread, cổ tay nút, và có kiểu dáng tinh tế cho gương mặt của bạn. Thích hợp cho cả môi trường công sở và mặc hàng ngày.','/PTTKYC_WEB_FINAL/storage/Image_Product/aotrang2.jpg'),
    (1, 'XL', 'Trắng', 20, '100% Cotton', 'Áo sơ mi nam màu trắng kinh điển được làm từ vải cotton 100% cho sự thoải mái và mềm mại. Chiếc áo này có cổ áo cài nút, túi ngực, và tay dài. Kết hợp cùng quần jeans cho một phong cách thoải mái hoặc quần âu để tạo ra một phong cách lịch lãm.','/PTTKYC_WEB_FINAL/storage/Image_Product/aotrang3.jpg'),
    
    (2, '30', 'Xanh Đậm', 12, 'Denim (100% Cotton)', 'Quần jeans nam màu xanh đậm sang trọng và bền bỉ, được làm từ 100% cotton cho sự thoải mái và độ bền. Có kiểu dáng truyền thống với 5 túi, khoá kéo và nút bấm, và kiểu dáng chân thẳng. Phù hợp cho mọi ngày hoặc dạo phố.','/PTTKYC_WEB_FINAL/storage/Image_Product/jean1.jpg'),
    (2, '32', 'Xanh Đậm', 8, 'Denim (98% Cotton, 2% Elastane)', 'Quần jeans slim-fit hiện đại màu xanh đậm, được làm từ hỗn hợp cotton và elastane cho sự co giãn và linh hoạt. Có kiểu dáng thấp eo, chân côn, và kiểu dáng 5 túi cổ điển. Lý tưởng cho phong cách hiện đại và thoải mái.','/PTTKYC_WEB_FINAL/storage/Image_Product/jean2.jpg'),
    (2, '34', 'Xanh Đậm', 6, 'Denim (100% Cotton)', 'Quần jeans chân thẳng màu xanh đậm truyền thống, được làm từ denim cotton 100% cho sự thoải mái và cấu trúc. Có kiểu dáng thấp eo, khoá kéo và nút bấm, và 5 túi truyền thống.','/PTTKYC_WEB_FINAL/storage/Image_Product/jean3.jpg'),
    
    (3, 'M', 'Đen', 5, 'Vỏ Nylon, Lớp lót Polyester', 'Áo khoác nam màu đen thanh lịch và đa dụng, có vỏ ngoài chống nước nylon và lớp lót polyester ấm áp. Có khoá kéo, cổ áo đứng, túi có khoá kéo, và cổ tay có thể điều chỉnh. Lý tưởng cho việc mặc lớp hoặc lớp dưới.','/PTTKYC_WEB_FINAL/storage/Image_Product/hoodie1.jpg'),
    (3, 'L', 'Đen', 7, 'Hỗn hợp Polyester (70% Polyester, 30% Cotton)', 'Áo khoác bom nam màu đen hiện đại với lớp vỏ hỗn hợp polyester cho cảm giác nhẹ nhàng. Có cổ áo và cổ tay bo, khoá kéo phía trước, và nhiều túi tiện lợi. Thích hợp cho việc tạo điểm nhấn cho bất kỳ bộ trang phục nào.','/PTTKYC_WEB_FINAL/storage/Image_Product/hoodie2.jpg'),
    (3, 'XL', 'Đen', 9, 'Vỏ Cotton, Lớp lót Polyester', 'Áo khoác nam màu đen truyền thống được làm từ vỏ cotton bền bỉ và lớp lót polyester thoải mái. Có khoá nút phía trước, cổ áo notch, và túi nắp cho kiểu dáng cổ điển và lịch lãm.','/PTTKYC_WEB_FINAL/storage/Image_Product/hoodie3.jpg'),
    
    (4, '7', 'Hồng', 3, 'Vật liệu tổng hợp (Cao su)', 'Dép nữ màu hồng pastel sang trọng và thoải mái, được làm từ vật liệu tổng hợp cho sự bền bỉ và dễ dàng bảo quản. Có lót nằm, dây quai rộng với chi tiết logo ép nổi, và đế cao su để tăng độ bám. Lý tưởng cho thời trang mùa hè.','/PTTKYC_WEB_FINAL/storage/Image_Product/dep1.jpg'),
    (4, '8', 'Hồng', 2, 'Vải trên, Đế cao su', 'Dép nữ màu hồng pastel với vải trên và lót đế bằng cao su cho sự thoải mái suốt cả ngày. Có quai giữa ngón chân, họa tiết hoa, và đế cao su linh hoạt để tăng độ bám. Thích hợp cho những ngày đi biển hoặc dạo phố.','/PTTKYC_WEB_FINAL/storage/Image_Product/dep2.jpg'),
    (4, '9', 'Hồng', 4, 'Da giả (Polyurethane)', 'Dép cao gót nữ màu hồng pastel thanh lịch được làm từ da giả với lớp hoàn thiện bóng. Có gót nhọn, quai đeo chân có thể điều chỉnh, và lót đệm êm ái để tạo sự thoải mái. Lý tưởng cho việc kết hợp với bất kỳ bộ trang phục nào.','/PTTKYC_WEB_FINAL/storage/Image_Product/dep3.jpg'),
    
    (5, 'M', 'Đỏ', 6, '100% Cotton', 'Áo thun nam cổ tròn màu đỏ được làm từ vải cotton mềm mại và thoáng khí cho sự thoải mái suốt cả ngày. Áo có tay ngắn, kiểu dáng regular fit, và thiết kế cổ điển phù hợp với quần jeans hoặc quần short cho phong cách thoải mái.','/PTTKYC_WEB_FINAL/storage/Image_Product/aodo1.jpg'),
    (5, 'L', 'Đỏ', 8, 'Hỗn hợp Cotton (60% Cotton, 40% Polyester)', 'Áo thun nam in hình màu đỏ hiện đại được làm từ hỗn hợp cotton thoải mái cho cảm giác mềm mại và nhẹ nhàng. Áo có cổ tròn, tay ngắn, và in hình đồng hồ phía trước để tạo điểm nhấn phong cách. Lý tưởng cho thêm sắc màu vào tủ đồ của bạn.','/PTTKYC_WEB_FINAL/storage/Image_Product/aodo2.jpg'),
    (5, 'XL', 'Đỏ', 10, 'Hỗn hợp Cotton (60% Cotton, 40% Polyester)', 'Áo thun nam in hình màu đỏ hiện đại được làm từ hỗn hợp cotton thoải mái cho cảm giác mềm mại và nhẹ nhàng. Áo có cổ tròn, tay ngắn, và in hình đồng hồ phía trước để tạo điểm nhấn phong cách. Lý tưởng cho thêm sắc màu vào tủ đồ của bạn.','/PTTKYC_WEB_FINAL/storage/Image_Product/aodo3.jpg'),
    
    
    (6, 'M', 'Nâu', 3, 'Da thật', 'Túi xách nữ màu nâu da thật, được làm từ da thật cao cấp cho sự sang trọng và bền bỉ. Túi có dây đeo vai có thể điều chỉnh, nắp gập đóng cài bằng khoá kéo và khoá nam châm, và nhiều ngăn tiện lợi bên trong.','/PTTKYC_WEB_FINAL/storage/Image_Product/tui1.jpg'),
    (6, 'L', 'Nâu', 2, 'Da tổng hợp (Polyurethane)', 'Túi xách nữ màu nâu sang trọng, được làm từ chất liệu da tổng hợp cao cấp với lớp hoàn thiện bóng. Túi có dây đeo vai có thể điều chỉnh, nắp gập đóng cài bằng khoá kéo, và nhiều ngăn tiện lợi bên trong.','/PTTKYC_WEB_FINAL/storage/Image_Product/tui2.jpg'),
    (6, 'XL', 'Nâu', 4, 'Da tổng hợp (PU Leather)', 'Túi xách nữ màu nâu sang trọng với chất liệu da tổng hợp PU cao cấp, mang lại sự bền bỉ và dễ dàng bảo quản. Túi có dây đeo vai có thể điều chỉnh, nắp gập đóng cài bằng khoá kéo, và nhiều ngăn tiện lợi bên trong.','/PTTKYC_WEB_FINAL/storage/Image_Product/tui3.jpg'),
    
    (7, 'M', 'Xanh Lá Cây', 5, '100% Cotton', 'Áo polo nam màu xanh lá cây, được làm từ vải cotton 100% cho sự thoải mái và mềm mại. Chiếc áo có cổ áo polo, tay ngắn và kiểu dáng regular fit, phù hợp với quần jeans hoặc quần short.','/PTTKYC_WEB_FINAL/storage/Image_Product/polo1.jpg'),
    (7, 'L', 'Xanh Lá Cây', 7, 'Cotton Blend (70% Cotton, 30% Polyester)', 'Áo polo nam màu xanh lá cây với chất liệu hỗn hợp cotton và polyester, mang lại cảm giác thoải mái và co giãn. Có cổ áo polo, tay ngắn và kiểu dáng regular fit, phù hợp cho mọi dịp.','/PTTKYC_WEB_FINAL/storage/Image_Product/polo2.jpg'),
    (7, 'XL', 'Xanh Lá Cây', 9, '100% Cotton', 'Áo polo nam màu xanh lá cây, được làm từ vải cotton mềm mại và thoáng khí. Chiếc áo có cổ áo polo, tay ngắn và kiểu dáng regular fit, lý tưởng cho việc kết hợp với quần jeans hoặc quần short.','/PTTKYC_WEB_FINAL/storage/Image_Product/polo3.jpg'),
   
    (8, 'M', 'Trắng', 6, '100% Cotton', 'Quần short nam màu trắng, được làm từ vải cotton mềm mại và thoáng khí cho sự thoải mái suốt cả ngày. Quần có kiểu dáng đơn giản với túi hông và túi sau, phù hợp cho các hoạt động ngoài trời hoặc dạo phố.','/PTTKYC_WEB_FINAL/storage/Image_Product/quanshorttrang.png'),
    (8, 'L', 'Trắng', 8, 'Cotton Blend (60% Cotton, 40% Polyester)', 'Quần short nam màu trắng với chất liệu hỗn hợp cotton và polyester, mang lại sự thoải mái và bền bỉ. Quần có kiểu dáng classic với túi hông và túi sau, lý tưởng cho mọi dịp.','/PTTKYC_WEB_FINAL/storage/Image_Product/quanshorttrang.png'),
    (8, 'XL', 'Trắng', 10, '100% Cotton', 'Quần short nam màu trắng, được làm từ vải cotton mềm mại và thoáng khí. Quần có kiểu dáng casual với túi hông và túi sau, phù hợp cho việc dạo phố hoặc đi picnic.','/PTTKYC_WEB_FINAL/storage/Image_Product/quanshorttrang.png');
    

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