<div style="color: red">
    <?php echo $error; ?>
</div>

<h1>
    Sửa giảng viên
</h1>

<form action="" method="post">
    Họ và tên:
    <input type="text"
           name="hovaten"
           value="<?php
           echo isset($_POST['hovaten']) ? $_POST['hovaten'] : $teacher['hovaten']?>"
    />
    <br />

    Ngày sinh :
    <input type="text"
           name="ngaysinh"
           value="<?php
           echo isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : $teacher['ngaysinh']?>"
    />
    <br />

    Giới tính:
    <input type="text"
           name="gioitinh"
           value="<?php
           echo isset($_POST['gioitinh']) ? $_POST['gioitinh'] : $teacher['gioitinh']?>"
    />
    <br />
    
    Trình độ: 
    <input type="text"
           name="trinhdo"
           value="<?php
           echo isset($_POST['trinhdo']) ? $_POST['trinhdo'] : $teacher['trinhdo']?>"
    />
    <br />

    Chuyên môn :
    <input type="text"
           name="chuyenmon"
           value="<?php
           echo isset($_POST['chuyenmon']) ? $_POST['chuyenmon'] : $teacher['chuyenmon']?>"
    />
    <br />

    Học hàm :
    <input type="text"
           name="hocham"
           value="<?php
           echo isset($_POST['hocham']) ? $_POST['hocham'] : $teacher['hocham']?>"
    />
    <br />

    Học vị :
    <input type="text"
           name="hocvi"
           value="<?php
           echo isset($_POST['hocvi']) ? $_POST['hocvi'] : $teacher['hocvi']?>"
    />
    <br />

    Cơ quan :
    <input type="text"
           name="coquan"
           value="<?php
           echo isset($_POST['coquan']) ? $_POST['coquan'] : $teacher['coquan']?>"
    />
    <br />

    <input type="submit" name="submit" value="Update" />
</form>