<?php
require_once 'config/db.php'; // ------ kết nối csdl để truy vấn xử lý DL, ánh xạ 1-1 với csdl
class Blood {
    public $bd_id;
    public $bd_name;
    public $bd_sex;
    public $bd_age;
    public $bd_bgroup;
    public $bd_reg_date;
    public $bd_phno;

    // insert into truyen vao 1 mang du lieu -> insert mang du lieu
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO blood_donor (bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno) 
        VALUES ('{$param['bd_name']}' , '{$param['bd_sex']}' , '{$param['bd_age']}' , '{$param['bd_bgroup']}' , '{$param['bd_reg_date']}' , '{$param['bd_phno']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }

    public function getBloodById($bd_id = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM blood_donor WHERE bd_id=$bd_id";
        $results = mysqli_query($connection, $querySelect);
        $blood = [];
        if (mysqli_num_rows($results) > 0) {
            $bloods = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $blood = $bloods[0];
        }
        $this->closeDb($connection);

        return $blood;
    }

    /**
     * Truy vấn lấy ra tất cả sách trong CSDL
     */
    public function index() {
        $connection = $this->connectDb();
        //truy vấn
        $querySelect = "SELECT * FROM blood_donor";
        $results = mysqli_query($connection, $querySelect);
        $blood = [];
        if (mysqli_num_rows($results) > 0) {
            $blood = mysqli_fetch_all($results, MYSQLI_ASSOC); //MYSQLI_ASSOC chỉ định lấy kqua dạng mảng kết hợp
        }
        $this->closeDb($connection);

        return $blood; // return ra kết quả dạng mảng
    }

    public function update($blood = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE blood_donor 
                        SET `bd_name` = '{$blood['bd_name']}', `bd_sex` = '{$blood['bd_sex']}', `bd_age` = '{$blood['bd_age']}', `bd_bgroup` = '{$blood['bd_bgroup']}', 
                        
                        `bd_reg_date` = '{$blood['bd_reg_date']}', `bd_phno` = '{$blood['bd_phno']}'
                        WHERE `bd_id` = {$blood['bd_id']}";
    
        $isUpdate = mysqli_query($connection, $queryUpdate);

        $this->closeDb($connection);

        return $isUpdate;
    }

    public function delete($bd_id = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM blood_donor WHERE bd_id = $bd_id";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
    // ----- phương thức kết nối tới csdl dùng chung cho cả các hàm bên trong class này
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    // -- đóng db khi mở db
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
}