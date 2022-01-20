<!-- xử lý add process add employee từ bên addEmployee -->
<?php

  // trước khi cho người dùng sử dụng admin này, thì phải xác thực nó có quyền làm việc không
  session_start();
  if(!isset($_SESSION['isLoginOK'])) {
    header('location: login.php');
  }

    // xử lý giá trị gửi từ addEmployee sang processAddEmployee
    if(isset($_POST['txtHoTen'])) {
        $hoTen = $_POST['txtHoTen'];
    }

    $chucVu = $_POST['txtChucVu'];
    $soMayBan = $_POST['txtSoMayBan'];
    $soDiDong = $_POST['txtSoDiDong'];
    $email = $_POST['txtEmail'];
    $madonVi = $_POST['cboDonVi'];

    // Bước 1: kết nối db
    $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
    if(!$conn) {
        die("Kết nối thất bạn");
    }

    // Bước 2: thực hiện truy vấn
    $sql = "INSERT INTO db_nhanvien (hovaten, chucvu, sodt_coquan, sodt_didong, email, ma_donvi)
    VALUES ('$hoTen', '$chucVu', '$soMayBan', '$soDiDong', '$email', '$madonVi')";

    $ketqua = mysqli_query($conn, $sql);
    if(!$ketqua) {
        header('location: error.php');
    } else {
        header('location: admin.php');
    }

    // buoc 4: dong ket noi
    mysqli_close($conn);
?>