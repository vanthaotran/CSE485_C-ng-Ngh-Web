<?php
    require_once "config/db.php";

    class UserModel {
        private $userID;
        private $userName;
        private $email;
        private $pass;

        public function getAllUser() {
            $conn = $this->connectDB();
            $sql = "SELECT * from db_nguoidung";
            $result = mysqli_query($conn, $sql);

            $arr_users = [];
            if(mysqli_num_rows($result) > 0) {
                $arr_users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }

            return $arr_users;
        }

        public function connectDB() {
            $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if(!$connection) {
                die('Khong the ket noi toi co so du lieu' . mysqli_connect_error());
            }

            return $connection;
        }

        public function closeDB($connection = null) {
            mysqli_close($connection);
        }

    }


?>