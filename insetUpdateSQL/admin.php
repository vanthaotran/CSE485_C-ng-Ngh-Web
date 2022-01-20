<?php
  // trước khi cho người dùng sử dụng admin này, thì phải xác thực nó có quyền làm việc không
  session_start();

  if(!isset($_SESSION['isLoginOK'])) {
    header("location: login.php");
  }

  include("template/header.php");

?>
    <h2 class="text-center mt-3">DANH BẠ ĐIỆN THOẠI ĐẠI HỌC THỦY LỢI TLU</h2>
    <a href="addEmployee.php" class="btn btn-primary">Thêm</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Mã nhân viên</th>
      <th scope="col">Họ và tên</th>
      <th scope="col">Chức vụ</th>
      <th scope="col">Số máy bàn</th>
      <th scope="col">Số di động</th>
      <th scope="col">Email </th>
      <th scope="col">Tên đơn vị</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>  
    </tr>
  </thead>
  <tbody>
    <!-- đổ dữ liệu từ csdl ra bảng -->
    <?php
        // Bước 1: kết nối database server
        $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
        if(!$conn) {
            die("Kết nối thất bại, vui lò ng kiểm tra lại thông tin");
        }
        // Bước 2: thực hiện truy vấn
        $sql = "SELECT ma_nhanvien, hovaten, chucvu, sodt_coquan, sodt_didong, db_nhanvien.email, ten_donvi from db_nhanvien, db_donvi where db_nhanvien.ma_donvi = db_donvi.ma_donvi";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <th scope="row"><?php echo $row['ma_nhanvien'] ?></th>
                <th><?php echo $row['hovaten'] ?></th>
                <th><?php echo $row['chucvu'] ?></th>
                <th><?php echo $row['sodt_coquan'] ?></th>
                <th><?php echo $row['sodt_didong'] ?></th>
                <th><?php echo $row['email'] ?></th>
                <th><?php echo $row['ten_donvi'] ?></th>
                <th><a href="updateEmployee.php?id=<?php echo $row['ma_nhanvien']; ?>"><i class=""></i>sua</a></th>
                <th><a href="deleteEmployee.php?id=<?php echo $row['ma_nhanvien']; ?>"><i class=""></i>xoa</a></th>
            </tr>
    <?php
            }
        }
        // Bước 4: đóng kết nối db server
        mysqli_close($conn);
    ?>
  </tbody>
</table>
    </div>
    <?php
  include("template/footer.php");
?>