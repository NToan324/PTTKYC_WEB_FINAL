<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    include __DIR__ . '/../../models/connect.php';
    include __DIR__ . '/../../models/user.php';
    $a = checkUser($email,$pass);
    if ($a == TRUE){
        header('Location: /PTTKYC_WEB_FINAL/src/views/Home/index.php');
    }else {
        $txt_error = "Sai mật khẩu hoặc tài khoản không tồn tại";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Login</title>
</head>

<body>
    <div class="background">
        <img src="/PTTKYC_WEB_FINAL/storage/Image/bg-login.png" alt="background">
    </div>
    <div class="container-login" id="container-login">
        <div class="container-login-form">
            <div class="header-login">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/logo.png" alt="logo">
                <span>Japan House</span>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-login">
                <h1>Đăng Nhập</h1>
                <input type="email" name="email" placeholder="Email" id="email">
                <p id="errorMessageEmail" class="errorMessage"></p>
                <div class="password-input">
                    <input type="password" name="password" placeholder="Mật khẩu" id="psw">
                    <!-- <i class="fa-solid fa-eye"></i> -->
                    <i class="fa-solid fa-eye-slash" id="eye-password-login"></i>
                </div>
                <p id="errorMessagePassword" class="errorMessage"></p>
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember-me">
                        <label for="rememberme">Lưu mật khẩu</label>
                    </div>
                    <a href="/PTTKYC_WEB_FINAL/src/views/ResetPassword/forgotten-pass.php">Quên mật khẩu</a>
                </div>
                <?php
                    if(isset($txt_error) && $txt_error!=""){
                        echo "<p style='color: red;padding-top:10px'>".$txt_error."</p>";
                    }
                ?>
                <button class="btn-login" id="btn-login">Đăng nhập</button>
                <div class="signup">
                    <span>Bạn mới biết đến chúng tôi?</span>
                    <a href="#" id="signup">Đăng ký</a>
                </div>
        </div>
        </form>
    </div>
    <div class="container-signup" id="container-signup">
        <div class="container-signup-form">
            <div class="header-signup">
                <img src="/PTTKYC_WEB_FINAL/storage/Image/logo.png" alt="logo">
                <span>Japan House</span>
            </div>
            <form action="/PTTKYC_WEB_FINAL/src/php/signup.php" method="post" class="form-signup">
                <h1>Đăng Ký</h1>
                <input type="text" name="name_signup" placeholder="Họ và tên" id="name-signup">
                <p id="errorMessageNameSignup" class="errorMessage"></p>
                <input type="email" name="email_signup" placeholder="Email" id="email-signup">
                <p id="errorMessageEmailSignup" class="errorMessage"></p>
                <div class="password-input">
                    <input type="password" name="password_signup" placeholder="Mật khẩu" id="psw-signup">
                    <!-- <i class="fa-solid fa-eye"></i> -->
                    <i class="fa-solid fa-eye-slash" id="eye-password-signup"></i>
                </div>
                <p id="errorMessagePasswordSignup" class="errorMessage"></p>
                <input type="password" name="password_confirm_signup" placeholder="Nhập lại mật khẩu"
                    id="psw-cf-signup">
                <p id="errorMessagePasswordConfirm" class="errorMessage"></p>
                <button class="btn-signup" id="btn-signup">Đăng ký</button>
                <div class="term-policy">
                    <p>Bằng việc đăng kí, bạn đã đồng ý với Japan House về <br>
                        <a href="#">Điều khoản dịch vụ</a> &
                        <a href="#">Chính sách bảo mật</a>
                    </p>
                </div>
                <div class="signup">
                    <span>Bạn đã có tài khoản?</span>
                    <a href="#" id="login">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>