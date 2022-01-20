<?php
    // validate form: use js
    if(!isset($_POST['btnSignUp'])) {
        header("location: signup.php");
    }
    $user =  $_POST['txtUser'];
    $email =  $_POST['txtEmail'];
    $pass1 =  $_POST['txtPassWord'];
    $pass2 =  $_POST['inputRetypePassword'];

    $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
    if(!$conn) {
        die('Loi roi');
    }
    $sql01 = "SELECT * from db_nguoidung where email='$email' or tendangnhap= '$user'  ";
    $result = mysqli_query($conn, $sql01);
    if(mysqli_num_rows($result) > 0) {
        $error = "User name/ hoặc tên đăng nhập đã tồn tại!";
        header("location: signup.php?error=$error");
    }
    else {
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $sql02 = "INSERT into db_nguoidung (tendangnhap, email, matkhau) values ('$user', '$email', '$pass_hash')";
        $result02 = mysqli_query($conn, $sql02);
        if($result02 > 0) {
            header("location: login.php");
        } else {
            $error = "Cannot insert record! Please try again!";
            header("location: signup.php?error=$error");
        }
    }

    mysqli_close($conn);
?>