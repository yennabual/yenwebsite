<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kinginanaman30@gmail.com';
    $mail->Password = 'xazsabpzbnbqrzsv'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Set the From address to the user's email address
    $userEmail = $_POST["email"];
    $mail->setFrom($userEmail, $userEmail);

    // Set the To address to your email address
    $mail->addAddress('kinginanaman30@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo "
    <script>
    alert('Sent Successfully');
    document.location.href = 'contact.php';
    </script>
    ";
}
?>
