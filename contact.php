<?php
// if($_POST){
//     $visitor_name = "";
//     $visitor_email = "";
//     $email_title = "";
//     $visitor_message = "";

//     if(isset($_POST['visitor_name'])){
//         $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
//         $email_body .= "<div>
//         <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span></div>";
//     }

//     if(isset($_POST['visitor_email'])){
//         $visitor_email = str_replace(array("/r","\n","%0a","%0d"), '', $_POST['visitor_email']);
//         $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
//         $email_body .= "<div><label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span></div>";
//     }
    
//     if(isset($_POST['email_title'])){
//         $email_title = filter_var($POST['email_title'],FILTER_SANITIZE_STRING);
//         $email_body .="<div><label><b>Title:</b></label>&nbsp;<span>".$email_title."</span></div>";
//     }

//     if(isset($_POST['visitor_message'])){
//         $visitor_message = htmlspecialchars($_POST['visitor_message']);
//         $email_body .= "<div> <label><b>Message:</b><label><div>".$visitor_message."</div></div>";
//     }

//     $recipient = "kienweng.2000@gmail.com";

//     $header = 'MIME-Version:1.0' . "\r\n" .'Content-type:text/html; charset=utf-8' . "\r\n" .'From:' . $visitor_email . "\r\n";

//     if(mail($recipient,$email_title,$email_body,$headers)){
//         echo "<p> Thank you for contacting us" .$visitor_name. "You will get a reply within 24 hours.</p>";
//     }
//     else{
//         echo "<p>We are sorry but the email did not go throguh.</p>";
//     }
// }
// else{
//     echo '<p>Something went wrong';
// }


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['submit'])){
    $visitor_email=$_POST['visitor_email'];
    $visitor_title=$_POST['visitor_title'];
    $visitor_name =$_POST['visitor_name'];
    $visitor_message=$_POST['visitor_message'];
}

try{
    $mail->SMTPDebug =2;
    $mail->isSMTP();
    $mail->Host         = 'smtp.gmail.com';
    $mail->SMTPAuth     = true;
    $mail->Username     = 'kienweng.2000@gmail.com';
    $mail->Password     = 'mmcpoqnuwanacvte';
    $mail->SMPTSecure   = 'tls';
    $mail->Port         = 587;

    $mail->setFrom('kienweng.2000@gmail.com','kien weng');
    $mail->addAddress('kienweng.2000@gmail.com','kien weng');
    // $mail->addAddress('', '');

    $mail->isHTML(true);
    $mail->Subject = $visitor_title;
    $mail->Body    = '<tr>
                        <td>Name:' .$visitor_name. '</td>
                        <td>Email:' .$visitor_email. '</td>
                        <td>Message:' .$visitor_message. '</td>
                      </tr>';
    $mail->send();
    echo "Mail has been sent successfully!";
}

catch (Exception $e){
    echo "Message could not be sent. Mailer Error:{$mail->ErrorInfo}";
}

?> 