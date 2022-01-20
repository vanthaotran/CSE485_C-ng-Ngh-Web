<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    session_start();
    if(!isset($_SESSION['isLoginOK'])){
        header("location:login.php");
    }
    // deleteEmployee: NHẬN DỮ LIỆU TỪ admin.php gửi sang
    $ma_nhanvien = $_GET['id'];

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','danhbatlu');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "SELECT * FROM db_nhanvien WHERE ma_nhanvien = '$ma_nhanvien'";

    $result = mysqli_query($conn,$sql); //Nó chỉ ra về 1 bản ghi, mà mình chỉ cần lấy 1 bản ghi thôi

    // Bước 03: Xử lý kết quả
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $ma_donvi = $row['ma_donvi'];
    }

    // Bước 04: Đóng kết nối
    mysqli_close($conn);

?>
<?php
    include("template/header.php");
?>
    <main>
    <div class="container">
        <h5 class="text-center text-primary mt-5">Cập nhật thông tin Danh bạ nhân viên</h5>
        <!-- Form thêm Dữ liệu nhân viên -->
        <form action="process-update-employee.php" method="post">
            <div class="form-group">
                <label for="txtMaNV">Mã nhân viên</label>
                <input type="text" class="form-control" readonly id="txtMaNV" name="txtMaNV" placeholder="Mã nhân viên" value="<?php echo $row['ma_nhanvien']; ?>">
                <!-- <small id="txtHoTenHelp" class="form-text text-muted">Có thể dùng nó hiển thị thông báo lỗi hoặc gợi ý</small> -->
            </div>

            <div class="form-group">
                <label for="txtHoTen">Họ và tên</label>
                <input type="text" class="form-control" id="txtHoTen" name="txtHoTen" placeholder="Nhập họ tên" value="<?php echo $row['hovaten']; ?>">
                <!-- <small id="txtHoTenHelp" class="form-text text-muted">Có thể dùng nó hiển thị thông báo lỗi hoặc gợi ý</small> -->
            </div>
            
            <div class="form-group">
                <label for="txtChucVu">Chức vụ</label>
                <input type="text" class="form-control" id="txtChucVu" name="txtChucVu" placeholder="Nhập chức vụ" value="<?php echo $row['chucvu']; ?>">
                <!-- <small id="txtHoTenHelp" class="form-text text-muted">Có thể dùng nó hiển thị thông báo lỗi hoặc gợi ý</small> -->
            </div>

            <div class="form-group">
                <label for="txtSoMayBan">Số máy bàn</label>
                <input type="tel" class="form-control" id="txtSoMayBan" name="txtSoMayBan" placeholder="Nhập số máy bàn" value="<?php echo $row['sodt_coquan']; ?>">
                <!-- <small id="txtHoTenHelp" class="form-text text-muted">Có thể dùng nó hiển thị thông báo lỗi hoặc gợi ý</small> -->
            </div>
            <div class="form-group">
                <label for="txtSoDiDong">Số di động</label>
                <input type="tel" class="form-control" id="txtSoDiDong" name="txtSoDiDong" placeholder="Số di động" value="<?php echo $row['sodt_didong']; ?>">
                
            </div>
            <div class="form-group">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Nhập email" value="<?php echo $row['email']; ?>">
               
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Đơn vị</label>
                <select class="form-control" id="cboDonVi" name="cboDonVi">
                    <!-- Truy vấn dữ liệu để Hiển thị lựa chọn Đơn vị -->
                    <?php 
                        // Bước 01: Kết nối Database Server
                        $conn = mysqli_connect('localhost','root','','danhbatlu');
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT * FROM db_donvi";

                        $result = mysqli_query($conn,$sql);

                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['ma_donvi'] == $ma_donvi){
                                    echo '<option selected value="'.$row['ma_donvi'].'">'.$row['ten_donvi'].'</option>';
                                }else{
                                    echo '<option value="'.$row['ma_donvi'].'">'.$row['ten_donvi'].'</option>';
                                }

                            }
                        }

                        // Bước 03: Đóng kết nối
                        mysqli_close($conn);
                    ?>
               
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu lại</button>
        </form>
    </div>    
    </main>
<?php
    include("template/footer.php");
?>