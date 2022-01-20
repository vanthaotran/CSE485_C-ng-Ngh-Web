<?php
    // http://localhost/project_mvc/index.php?controller=user&action=index
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    $controller = ucfirst($controller);
    $fileController = $controller . "Controller.php";
    $pathController = "controller/$fileController";

    if(!file_exists($pathController)) {
        die('Trang ban tim khong ton tai');
    }
    require_once "$pathController";

    $classController = $controller."Controller"; // đã nhảy vào trong file php của thư mục controller
    $object = new $classController();

    if(!method_exists($object, $action)) {
        die("Phuong thuc $action  khong ton tai trong class $classController");
    }
    $object->$action(); // gọi action tương ứng với tên phương thức

?>