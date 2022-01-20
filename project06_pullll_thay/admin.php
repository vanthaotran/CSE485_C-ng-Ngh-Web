<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    session_start();
    if(!isset($_SESSION['isLoginOK'])){
        header("location:login.php");
    }
    
    require "template/header.php";
?>
    <main>
        <div class="container">
            <h5 class="text-center text-primary mt-5">DANH BẠ ĐIỆN THOẠI CÁN BỘ/GIẢNG VIÊN TRƯỜNG ĐH THỦY LỢI</h5>
            <div>
                <a class="btn btn-primary" href="add_employee.php">Thêm</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Số máy bàn</th>
                        <th scope="col">Số di động</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tên đơn vị</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Vùng này là Dữ liệu cần lặp lại hiển thị từ CSDL -->
                    <?php
                        // Bước 01: Kết nối Database Server
                        $conn = mysqli_connect('localhost','root','','danhbatlu');
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT nv.ma_nhanvien, nv.hovaten, nv.chucvu, nv.sodt_coquan, nv.sodt_didong, nv.email, dv.ten_donvi FROM db_nhanvien nv, db_donvi dv WHERE nv.ma_donvi = dv.ma_donvi";
                        $result = mysqli_query($conn,$sql);
                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $row['ma_nhanvien']; ?></th>
                                    <td><?php echo $row['hovaten']; ?></td>
                                    <td><?php echo $row['chucvu']; ?></td>
                                    <td><?php echo $row['sodt_coquan']; ?></td>
                                    <td><?php echo $row['sodt_didong']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['ten_donvi']; ?></td>
                                    <td><a href="update_employee.php?id=<?php echo $row['ma_nhanvien']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a href="delete_employee.php?id=<?php echo $row['ma_nhanvien']; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                    <?php
                            }
                        }
                        // Bước 04: Đóng kết nối Database Server
                        mysqli_close($conn);
                    ?>
                    
                    
                </tbody>
                </table>
        </div>    
    </main>

<?php
    include("template/footer.php");
?>