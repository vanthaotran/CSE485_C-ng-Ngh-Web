<?php
if($_POST['email']) // kiểm tra người dùng có nhấp vào nút submit hay chưa? đã nhập dữ liệu cho phần tử email hay chưa
{
    // bước 1: gọi lại đoạn kết nối db server
    require "db.php";

    // bước 2: thực hiện truy vấn
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");

    // bước 3: xử lý kết quả
    if(mysqli_num_rows($result) <= 0) // kiểm tra email đó chưa được dùng -> thì mới cho đăng ký
    {
        echo "Email hop le, co the dang ky";


        // $token = md5($_POST['email']).rand(10,9999); // sử dụng giải thuật md5 để sinh ra chuỗi ngẫu nhiên được bóc

        // // lưu lại thoogn tin đăng ký vào csdl, lấy dữ liệu từ form gửi sang
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // $sql = "INSERT INTO users(name, email, email_verification_link ,password) VALUES('$name', '$email', '$token', '$pass')";
        // // ra lệnh lưu vào csdl
        // mysqli_query($conn, $sql);

        // // sau khi xong, chúng ta cần gửi tới email đnăg ký 1 đường link tới website
        // // yêu cầu người dùng nhấp để kích hoạt, biến link đường dẫn kích hoạt sẽ gửi vào email

        // $link = "<a href='http://localhost/php_email_db/activation.php?key=".$email."&token=".$token."'>Nhấp vào đây để kích hoạt!</a>";

        // // quá trình gửi email
        // include "send_mail.php";
        // if(sendEmailForAccountActive($email, $link)) {
        //     echo 'Vui lòng kiểm tra hộp thư của bạn để kích hoạt tài khoản';
        // } else {
        //     echo "Xin lỗi email chưa được gửi đi, vui lòng kiểm tra lại thông tin đăng ký tài khoản";
        // }

        // require_once('phpmail/PHPMailerAutoload.php');
        // $mail = new PHPMailer();
        // $mail->CharSet =  "utf-8";
        // $mail->IsSMTP();
        // // enable SMTP authentication
        // $mail->SMTPAuth = true;                  
        // // GMAIL username
        // $mail->Username = "your_email_id@gmail.com";
        // // GMAIL password
        // $mail->Password = "your_gmail_password";
        // $mail->SMTPSecure = "ssl";  
        // // sets GMAIL as the SMTP server
        // $mail->Host = "smtp.gmail.com";
        // // set the SMTP port for the GMAIL server
        // $mail->Port = "465";
        // $mail->From='your_gmail_id@gmail.com';
        // $mail->FromName='your_name';
        // $mail->AddAddress('reciever_email_id', 'reciever_name');
        // $mail->Subject  =  'Reset Password';
        // $mail->IsHTML(true);
        // $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
        // if($mail->Send())
        // {
        // echo "Check Your Email box and Click on the email verification link.";
        // }
        // else
        // {
        // echo "Mail Error - >".$mail->ErrorInfo;
        // }
        }
    else
    {
        echo "Email da duoc dang ky , vui long kiem tra hop thu va kich hoat!";
        
    }
}
?>