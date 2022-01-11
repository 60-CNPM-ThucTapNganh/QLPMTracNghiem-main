<?php
//Import PHPMailer classes into the global namespace
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'killerbee0088@gmail.com';                     //SMTP username
    $mail->Password   = '011235813aA';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // $mail->setFrom('killerbee0088@gmail.com');
    // $mail->addAddress('8minger@gmail.com');       //Add a recipient
    // $mail->addReplyTo('info@example.com');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    $mail->setFrom('killerbee0088@gmail.com');
    $mail->addAddress('8minger@gmail.com'); 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('img/tailieu.jpg', 'tai.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Admin From QuanLiTracNghiem';
    $mail->Body    = 'Cảm ơn bạn đã đăng ký. Chúng tôi xin gửi một số tư liệu học tập cho bạn';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if( $mail->send())
      echo 'Message has been sent';
     else{
        echo "Error";
    }

    ?>