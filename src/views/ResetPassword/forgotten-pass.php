<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $email = $_POST['email'];
        include __DIR__ . '/../../models/connect.php';
        include __DIR__ . '/../../models/user.php';
        $a = checkUser2($email);
        if ($a == TRUE){
            echo "Email sent successfully";
            header('Location: /PTTKYC_WEB_FINAL/src/views/ResetPassword/reset-code.php');
            
        }else {
            $txt_error = "Incorrect email.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forgot</title>
    <link rel="stylesheet" href="/PTTKYC_WEB_FINAL/src/views/ResetPassword/forgot-pass.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <h1>Forgot Password</h1>
                <h2>Mail Address More</h2>
                <p>
                    Enter your email and we'll send you a link to get back
                    into your account.
                </p>
                <input type="email" name='email' placeholder="Email" required />
                <?php
                if(isset($txt_error) && $txt_error!=""){
                    echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                }
                ?>
                <input type="submit" name="send" value="Recover Password" style="background:#512da8;color:#fff">
            </form>
        </div>
    </div>

</body>

</html>