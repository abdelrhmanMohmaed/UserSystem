<?php

use UserSystem\Classes\Models\Users;
use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Db;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader 
require_once("../../app.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


$user = new Users;
$message = new Message;
if ($request->postHas('action') && $request->post('action') == 'forgot') {

    $email = $request->post('email');
    $user_found =  $user->select_email($email);
    if ($user_found != null) {
        $token = uniqid();
        $token = str_shuffle($token);

        $user->forgotPassword($token, $email);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = DB::USERNAME;                     //SMTP username
            $mail->Password   = DB::PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients

            $mail->setFrom(DB::USERNAME, 'DCodeMania');   ///this emaill will send
            $mail->addAddress($email);


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Reset Password";
            $mail->Body    = '<h3>Click the below link to reset your password. <br>
            <a href="<?=URL."handler/reset-pass.php?email=' . $email . '&token=' . $token . '"?>"><br>Regards<br>DCodeMania!!</a></h3>';

            // echo $message->showMessage('success', "we have send you the reset link in your e-Mail ID , please check e-Mail");
            $mail->send();

            echo $message->showMessage('success', "we have send you the reset link in your e-Mail ID , please check e-Mail");
        } catch (Exception $e) {
            echo $message->showMessage('danger', "Some thing went wrong please try again later!! {$mail->ErrorInfo}");
        }
    } else {
        echo $message->showMessage('info', "That e-Mail not registered!!");
    }
}
