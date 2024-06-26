<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../../vendor/phpmailer/phpmailer/src/SMTP.php';

function checkUser($email, $pass) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser1($name, $email) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?  AND email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser2($email) {   
    $mail = new PHPMailer(); 
    $conn = get_connection();
    $email = mysqli_real_escape_string($conn, $email);
    $check_email = "SELECT * FROM users WHERE email='$email' limit 1";
    $run_sql = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(9999, 1111);
        $insert_code = "UPDATE users SET code = $code WHERE email = '$email' limit 1";
        $run_query =  mysqli_query($conn, $insert_code);
        if($run_query){
            $mail->SMTPDebug = 0;  
            $mail->Mailer = "smtp"; 
            $mail->isSMTP();                          
            $mail->Host = 'smtp.gmail.com';            
            $mail->SMTPAuth = true;                     
            $mail->Username = 'lehan14102004@gmail.com';                 
            $mail->Password = 'ilos jzpv eqxg xtvw';       
            $mail->SMTPSecure = 'tls';                  
            $mail->Port = 587;
            $mail->setFrom('52200155@student.tdtu.edu.vn', 'Requirements Analysis and Design');
            $mail->addAddress($email);    
            $mail->isHTML(true);                                  
            $mail->Subject = 'Password Reset Code';
            $mail->Body    = "Your password reset code is $code";
            $mail->send(); 
            return TRUE;
        }
    }
    return FALSE;
}
function checkUser3($code) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    return $rowCount > 0;
}   
function checkUser4($pass1, $code) {
    $conn = get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    
    if ($rowCount > 0) {
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE code = ?");
        $stmt->bind_param("ss", $pass1, $code);
        $stmt->execute();
        $stmt->close();
        return TRUE;
    }
    return FALSE;
}  
?>