<?php
    // nhận từ register.php

    if(isset($_POST['btnRegister'])) {
        if(isset($_POST['email']) && $_POST['email'] != '') {
            include "send_mail.php";
            if(sendEmailForAccountActive($_POST['email'])) {
                echo 'Email đã được gửi đến tài khoản của bạn. Check mail!';
            } else {
                echo 'Xin lỗi, email chưa được gửi đi!';
            }
        }
    }

?>