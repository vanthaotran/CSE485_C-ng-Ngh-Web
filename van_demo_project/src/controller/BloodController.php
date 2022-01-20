<?php
require_once 'model/Blood.php'; 
class BloodController { // ----
    public function index() {
        echo "<h1>Hiển thị danh sách</h1>"; // dạng bảng
        $blood = new Blood(); // tu model
        $bloods = $blood->index(); // truyen sang view index trang chu
        require_once 'view/blood/index.php';
    }

    public function add() {
        $error = '';
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $bgroup = $_POST['bgroup'];
            $reg_date = $_POST['reg_date'];
            $phone = $_POST['phone'];

            $blood = new Blood();
            $bloodArr = [
                'name' => $name,
                'sex' => $sex,
                'age' => $age,
                'bgroup' => $bgroup,
                'reg_date' => $reg_date,
                'phone' => $phone
            ];
            $isInsert = $blood->insert($bloodArr);
            if ($isInsert) {
                $_SESSION['success'] = "Thêm mới thành công";
            }
            else {
                $_SESSION['error'] = "Thêm mới thất bại";
            }
            header("Location: index.php?controller=blood&action=index");
            exit();
        }
        require_once 'view/blood/add.php';
    }

    public function detail() { // ok
        echo "<h1>Hiển thị chi tiết danh sách</h1>";
        $blood = new Blood(); // tu model
        $bloods = $blood->index(); // truyen sang view index trang chu
        require_once 'view/blood/index.php';
    }

    public function edit() {
        if (!isset($_GET['bd_id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=blood&action=index");
            return;
        }
        if (!is_numeric($_GET['bd_id'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=blood&action=index");
            return;
        }
        $bd_id = $_GET['bd_id'];
        
        //gọi model để lấy ra đối tượng sách theo id
        $bloodModel = new Blood();
        $blood = $bloodModel->getBloodById($bd_id); // lay sach theo id nhan duoc tu GET

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'] ?? "";
            $sex = $_POST['sex'] ?? "";
            $age = $_POST['age'] ?? "";
            $bgroup = $_POST['bgroup'] ?? "";
            $reg_date = $_POST['reg_date'] ?? "";
            $phone = $_POST['phone'] ?? "";
            //check validate dữ liệu
            if (empty($name)) {
                $error = "Name không được để trống";
            }
            else {
                //xử lý update dữ liệu vào hệ thống
                $bloodModel = new Blood();
                $bloodArr = [
                    'name' => $name,
                    'sex' => $sex,
                    'age' => $age,
                    'bgroup' => $bgroup,
                    'reg_date' => $reg_date,
                    'phone' => $phone
                ];
                $isUpdate = $bloodModel->update($bloodArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Update bản ghi #$bd_id thành công";
                }
                else {
                    $_SESSION['error'] = "Update bản ghi #$bd_id thất bại";
                }
                header("Location: index.php?controller=blood&action=index");
                exit();
            }
        }
        //truyền ra view
        require_once 'view/blood/edit.php';
    }

    public function delete() {
        $bd_id = $_GET['bd_id'];
        if (!is_numeric($bd_id)) {
            header("Location: index.php?controller=blood&action=index");
            exit();
        }

        $blood = new Blood();
        $isDelete = $blood->delete($bd_id);

        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $_SESSION['success'] = "Xóa bản ghi #$bd_id thành công";
        }
        else {
            //báo lỗi
            $_SESSION['error'] = "Xóa bản ghi #$bd_id thất bại";
        }
        header("Location: index.php?controller=blood&action=index");
        exit();
    }
}