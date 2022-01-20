<?php
// 1. import cau hinh buoc 1
require 'dbConfig.php';
$statusMsg = ''; // tạo ra 1 biến để lưu lại trạng thái upload nhằm mục tiêu phản hồi lại cho người dùng

// 1. Động tác thiết lập cho việc chuẩn bị upload
$targetDir = "uploads/"; // thư mục chỉ định, nằm trong cùng project này để lưu trữ tệp tải lên
$fileName = basename($_FILES["myFile"]["name"]); // $_FILE là 1 biến siêu toàn cục lưu trữ toàn bộ phần tử file trên form

$targetFilePath = $targetDir . $fileName; // đây là tên đầy đủ + đường dẫn sau khi việc upload hoàn thành
// nó là giá trị cần phải truyền vào hàm move_upload_file

$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // bắt định dạng tệp tin, ktra định dạng có hợp lệ hay k

// 2. kiểm tra người dùng đã submit chưa, và file đã được chọn chưa?
if (isset($_POST["sbmUpload"]) && !empty($_FILES["myFile"]["name"])) {
    // khai báo mảng để lưu trữ các định dạng mà bạn cho phép upload len
    if (file_exists($targetFilePath)) {
        echo 'Tep tin da ton tai';
    } else {
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) { // phương thức in_array kiểm tra 1 giá trị có thuộc mảng hay không
            // nếu có -> xử lý upload cái tệp tin đang lưu ở thư mục tạm C:\xampp\tmp\$_FILES["myFile"]["tmp_name"]
            if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetFilePath)) { // nghĩa là lấy từ nơi tạm đẩy vào nơi chính
                // lưu đường dẫn vào csdl
                $sql = "INSERT into db_images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW())";
                $insert = mysqli_query($db, $sql); // giống mysqli_query
                if ($insert) { // ktra việc query thành công?
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    header("location: show.php");
                } else { // prbolem
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>