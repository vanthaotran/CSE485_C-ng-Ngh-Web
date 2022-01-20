<?php
    require_once "model/UserModel.php";

    class UserController {
        function index() {
            $userModel = new UserModel(); // UserModel ở bên Model
            $users = $userModel->getAllUser(); // trả về 1 mảng

            require_once "view/user/index.php";
        }

    }


?>