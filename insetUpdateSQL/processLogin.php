<!-- xử lý add process add employee từ bên addEmployee
<?php

    // tạo session: mặc định mỗi phiên làm việc có thời hạn là 24ph
    //session_start();

    // xử lý giá trị gửi từ addEmployee sang processAddEmployee
    // if(isset($_POST['btnSignIn'])) { // kiểm tra: có cái việc: được truyền dữ liệu bấm nút button theo phương thức post hay không
    //     $user = $_POST['txtEmail'];
    //     $password = $_POST['txtPassWord'];
    //     // check người dùng có nhập đủ thông tin không
    // } else {
    //     header("location: login.php");
    //     $error = "Bạn cần phải đăng nhập đã rồi mới vào admin sửa bạn nhé!";
    //     header("location: login.php?error=$error"); // logic sai ?
        
    // }
    // // Bước 1: kết nối db
    // $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
    // if(!$conn) {
    //     die("Kết nối thất bạn");
    // }

    // // Bước 2: thực hiện truy vấn
    // $sql = "SELECT * from db_nguoidung where email= '$user' and matkhau= '$password' ";

    // $ketqua = mysqli_query($conn, $sql);
    // if(mysqli_num_rows($ketqua) > 0) {
    //     // cấp thẻ làm việc, nếu có thì mới cho truy cập
    //     $_SESSION['isLoginOK'] = $email;
    //     header('location: admin.php');
    // } else {
    //     $warning = "Bạn nhập sai email hoặc mật khẩu chưa chính xác";
    //     header("location: login.php?error=$warning");
    // }

    // // buoc 4: dong ket noi
    // mysqli_close($conn);
    echo 'ngoài if';

    // NGĂN CHẶN SQL INJECTION 
    if(isset($_POST['btnSignIn']) && isset($_POST['txtEmail'])) {
        // ket noi csld
        echo 'hahahah';
        require('config.php');
        $email = $_POST['txtEmail'];
        $pass = $_POST['txtPassWord'];
        // thuc hien truy van
        $sql = "SELECT * from db_nguoidung where email=? and matkhau=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
        if(mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $mand, $tennd, $emailnd, $matkhaund);
            if(mysqli_stmt_fetch($stmt)) {
                echo $emailnd;
            } else {
                echo 'Dữ liệu không khớp. Ví dụ chống SQL injection';
            }
        } else {
            echo 'Không có dữ liệu';
        }

    }

    // form validation js
    // form validation php


?> -->