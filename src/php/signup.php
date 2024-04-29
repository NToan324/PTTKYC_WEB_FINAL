<?php
include("db.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name_signup"];
    $email = $_POST["email_signup"];
    $password = $_POST["password_signup"];

    // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay chưa
    $check_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script type='text/javascript'>alert('Tài khoản đã tồn tại!');
        window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
        </script>";
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Thêm người dùng mới vào cơ sở dữ liệu
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'>
                    alert('Đăng ký thành công!');
                    window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
                </script>";
        } else {
            echo "<script type='text/javascript'>alert('Đăng kí không thành công');
            window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
            </script>";
        }
    }
}
