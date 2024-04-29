<?php
include("db.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['email_login']) && isset($_POST['password_login'])) {
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if(password_verify($password, $user_data['password'])) {
                header("location:/PTTKYC_WEB_FINAL/src/views/Home/index.php");
                exit;
            } else {
                echo "<script type='text/javascript'>alert('Sai mật khẩu!');
                window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
                </script>";
            }  
        } else {
            echo "<script type='text/javascript'>alert('Email không tồn tại!');
            window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
            </script>";
        }
    }
}
