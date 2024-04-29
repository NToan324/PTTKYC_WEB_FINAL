<?php
    // session_start();
    // ob_start();
    // function resendCode() {
    //     if (isset($_SESSION['email'])) {
    //         $email = $_SESSION['email'];
    //         $code = rand(1111, 9999);
    //         // Make sure updateVerificationCode() and sendEmail() are defined
    //         updateVerificationCode($email, $code);
    //         sendEmail($email, $code);
    //     } else {
    //         echo "Email not found in session.";
    //     }
    // }
    // if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['resend'])) {
    //     resendCode();
    // }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = $_POST['code'];
        include __DIR__ . '/../../models/connect.php';
        include __DIR__ . '/../../models/user.php';
        $a = checkUser3($code);
        if ($a == TRUE){
            file_put_contents("temp.txt", $code);
            header('Location: /PTTKYC_WEB_FINAL/src/views/ResetPassword/change-pass.php');
        }else {
            $txt_error = "Incorrect code.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="/PTTKYC_WEB_FINAL/src/views/ResetPassword/forgot-pass.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <h1>Email Verification</h1>
                <h2>Get Your Code</h2>
                <p>Please enter the 4 digit code that received from your email.</p>
                <div class="otp-container">
                    <input type="text" placeholder="Enter your Code" required name="code">
                    <!-- <input type="text" required class="space" maxlength="1" onkeyup="focusNext(this, 'otp2')" />
                    <input type="text" required class="space" maxlength="1" id="otp2"
                        onkeyup="focusNext(this, 'otp3')" />
                    <input type="text" required class="space" maxlength="1" id="otp3"
                        onkeyup="focusNext(this, 'otp4')" />
                    <input type="text" required class="space" maxlength="1" id="otp4" onkeyup="focusNext(this, null)" /> -->
                </div>
                <?php
                if(isset($txt_error) && $txt_error!=""){
                    echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                }
                ?>
                <input type="submit" name="send" value="Recover Password" style="background:#512da8;color:#fff">
                <p>
                    If you haven't received the code yet?
                    <a href="">Resend</a>
                </p>
            </form>
        </div>
    </div>
    <script>
    function focusNext(current, nextInputId) {
        const maxLength = parseInt(current.getAttribute('maxlength'))
        const currentLength = current.value.length

        if (currentLength >= maxLength) {
            if (nextInputId) {
                const nextInput = document.getElementById(nextInputId)
                if (nextInput) {
                    nextInput.focus()
                }
            }
        }
    }
    </script>

</body>

</html>