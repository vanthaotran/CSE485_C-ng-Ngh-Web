<?php
  // trước khi cho người dùng sử dụng admin này, thì phải xác thực nó có quyền làm việc không
  session_start();
  if(!isset($_SESSION['isLoginOK'])) {
    header('location: login.php');
  }

  include("template/header.php");
?>
        <h5 class="text-center mt-5"><strong>THÊM MỚI DANH DẠ NHÂN VIÊN</strong></h5>
    <form action="processAddEmployee.php" method="post">
        <div class="form-group mt-2">
            <label for="txtHoTen">Họ và tên</label>
            <input type="text" class="form-control" id="txtHoTen" name = "txtHoTen" placeholder="Nhập họ tên">
        </div>
        <div class="form-group mt-2">
            <label for="txtChucVu">Chức vụ</label>
            <input type="text" class="form-control" id="txtChucVu" name = "txtChucVu" placeholder="Nhập chức vụ">
        </div>
        <div class="form-group mt-2">
            <label for="txtSoMayBan">Số máy bàn</label>
            <input type="text" class="form-control" id="txtSoMayBan" name = "txtSoMayBan" placeholder="Nhập số máy bàn">
        </div>
        <div class="form-group mt-2">
            <label for="txtSoDiDong">Số di dộng</label>
            <input type="text" class="form-control" id="txtSoDiDong" name = "txtSoDiDong" placeholder="Nhập số di động">
        </div>
        <div class="form-group mt-2">
            <label for="txtEmail">Email</label>
            <input type="text" class="form-control" id="txtEmail" name = "txtEmail" placeholder="Nhập email">
        </div>

        <div class="form-group mt-2">
            <label for="cboDonVi">Đơn vị</label>
            <select name="cboDonvi" id="cboDonvi" class="form-select">
                <!-- hiển thị dữ liệu vào ô option select cho người dùng nhìn thấy và chọn (từ dữ liệu) -->
                <!-- truy vấn dữ liệu để hiển thị từ db vào đây -->
                <?php
                    // Bước 1: kết nối db
                    $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
                    if(!$conn) {
                        die('Lỗi');
                    }
                    // Bước 2: truy vấn dữ liệu
                    $sql = "SELECT * FROM db_donvi";
                    $result = mysqli_query($conn, $sql);
                    // Buowsc 3: xử lý kết quả truy vấn
                    if(mysqli_num_rows($result)) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>  
                            <option value="<?php echo $row['ma_donvi']; ?>"><?php echo $row['ten_donvi']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            
        </div>
        <button type="submit" class="btn btn-primary mt-2">Lưu lại</button>
    </form>
    </div>
    <?php
  include("template/footer.php");
?>