<?php
  // trước khi cho người dùng sử dụng admin này, thì phải xác thực nó có quyền làm việc không
  session_start();
  if(!isset($_SESSION['isLoginOK'])) {
    header('location: login.php');
  }

    // admin.php truyền dữ liệu sang
    // deleteEmployee.php nhận dữ liệu, phải check dữ liệu từ admin gửi sang
    $maNhanVien = $_GET['id'];
    // bước 1: kết nối db
    $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
    if(!$conn) {
        die("Lỗi kết nối");
    }
    // buowsc 2: thực hiện truy vấn
    $sql = "DELETE FROM db_nhanvien WHERE ma_nhanvien = '$maNhanVien'";
    $number = mysqli_query($conn, $sql);
    if($number > 0) {
        header('location: admin.php');
    }
    else {
        header('location: error.php');
    }

    // if(!$number) {
    //     header('location: error.php');
    // }
    // else {
    //     header('location: admin.php');
    // }
    mysqli_close($conn);
?>