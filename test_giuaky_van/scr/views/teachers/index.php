<?php
//file hiển thị thông báo lỗi
require_once 'views/commons/error.php';
?>
<a href="index.php?controller=teacher&action=add">
    Thêm giảng viên mới
</a>
<br>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Mã giảng viên</th>
        <th>Họ và tên</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        <th>Trình độ</th>
        <th>Chuyên môn</th>
        <th>Học hàm</th>
        <th>Học vị</th>
        <th>Cơ quan</th>
        <th>Thao tác</th>
    </tr>
    <?php if (!empty($teachers)): ?>          <!-- bien books nay truyen tu BookController.php sang -->
        <?php foreach ($teachers AS $teacher) : ?>
            <tr>
                <td><?php echo $teacher['magv'] ?></td>
                <td><?php echo $teacher['hovaten'] ?></td>
                <td><?php echo $teacher['ngaysinh'] ?></td>
                <td><?php echo $teacher['gioitinh'] ?></td>
                <td><?php echo $teacher['trinhdo'] ?></td>
                <td><?php echo $teacher['chuyenmon'] ?></td>
                <td><?php echo $teacher['hocham'] ?></td>
                <td><?php echo $teacher['hocvi'] ?></td>
                <td><?php echo $teacher['coquan'] ?></td>
                <td>
                    <?php
                    //khai báo 3 url xem, sửa, xóa
                    $urlDetail =
                        "index.php?controller=teacher&action=detail&magv=" . $teacher['magv'];
                    $urlEdit =
                        "index.php?controller=teacher&action=edit&magv=" . $teacher['magv'];
                    $urlDelete =
                        "index.php?controller=teacher&action=delete&magv=" . $teacher['magv'];
                    ?>
                    <a href="<?php echo $urlDetail?>">Chi tiết</a> &nbsp;
                    <a href="<?php echo $urlEdit?>">Sửa</a> &nbsp;
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                       href="<?php echo $urlDelete?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
</table>