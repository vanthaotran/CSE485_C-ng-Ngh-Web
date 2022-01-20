<!-- thầy: kitudu99@gmai.com tiêu đề thư cần pharhi để [CSE485] Điểm danh tuần 20-27/12
nội dung thu: mã sinhvieen - họ tên
-->

<?php
    $username = 'thaovannihong@gmail.com';
    $password = 'eydrnvbdtwfcdpoj';

    // thư viện php mailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

function sendEmailForAccountActive($email) {
    global $username; // cho là biến global để sử dụng bởi hàm 
    global $password;
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // địa chỉ email đóng vai trò gửi thư
        $mail->Username   = $username;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';
    
        //Recipients
        $mail->setFrom('thaovannihong@gmail.com', 'Mailer');
        $mail->addAddress($email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('documents/Demo.xlsx');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML  hiểu được nội dung
        $mail->Subject = '[CSE485] Điểm danh tuần 20-27/12';
        $mail->Body    = 'Mã sinh viên: 1951061116 - Tên sinh viên: Trần Thảo Vân';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        if($mail->send()) {
            return true;
        }
        
        else {
            return false;
        }
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}



?>