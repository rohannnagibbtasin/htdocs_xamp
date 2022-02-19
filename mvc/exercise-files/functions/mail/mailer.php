<?php
    require_once 'C:/xampp/htdocs/mvc/exercise-files/functions/mail/PHPMailer/PHPMailer.php';
    require_once 'C:/xampp/htdocs/mvc/exercise-files/functions/mail/PHPMailer/Exception.php';
    require_once 'C:/xampp/htdocs/mvc/exercise-files/functions/mail/PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function send_mail($email,$sub,$body,$header){
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tanviranjum10801080@gmail.com';                     //SMTP username
        $mail->Password   = '01787594911';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;
        $mail->SMTPSecure = 'ssl';  

        $mail->setFrom('tanviranjum10801080@gmail.com',$header);
        $mail->addAddress($email);

        $mail->isHTML(true);                                  
        $mail->Subject = $sub;
        $mail->Body    = $body;
        $mail->AltBody = $body;

        if($mail->send()){
            return true;
        }
        else{
            return false;
        }

    }

?>