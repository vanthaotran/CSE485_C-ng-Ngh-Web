<?php

  // trước khi cho người dùng sử dụng admin này, thì phải xác thực nó có quyền làm việc không
  session_start();
  if(!isset($_SESSION['isLoginOK'])) {
    header('location: login.php');
  }

    // nhận dữ liệu từ updateEmployee sang
    $manhanvien = $_POST['txtMaNhanVien'];
    $hoten = $_POST['txtHoTen'];
    $chucvu = $_POST['txtChucVu'];
    $somaybay = $_POST['txtSoMayBan'];
    $sodidong = $_POST['txtSoDiDong'];
    $email = $_POST['txtEmail'];
    $donvi = $_POST['cboDonvi'];

    // 1. kết nối db
    $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
    if(!$conn) {
        die('Loi ket noi roi!');
    }

    // 2. truy van
    $sql = "UPDATE db_nhanvien set hovaten = '$hoten', chucvu = '$chucvu', sodt_coquan = '$somayban', sodt_didong = '$sodidong', email = '$email', ma_donvi = '$donvi' where ma_nhanvien = '$manhanvien'";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        header('location: error.php');
    } else {
        header('location: admin.php');
    }

    // 3. dong ket noi
    mysqli_close($conn);
?>
