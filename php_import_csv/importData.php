<?php
// 1. nạp tệp tin dbcConfig.php để thực hiện kết nối db
require_once 'dbConfig.php';

if (isset($_POST['importSubmit'])) { // ktra người dùng đã nhấn submit trên form chưa

    // kiểu tệp tin
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // ktra tệp tin đã được chọn chưa và đã phải là tệp đuôi csv chưa
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

        // ktra tệp này đã được tải lên chưa (tải lên thư mục tạm, không quan tâm đến việc upload thực sự tệp tin này vào thư mục chỉ định)
        if (is_uploaded_file($_FILES['file']['tmp_name'])) { // nếu thư mục tạm trên server đã có file được tải lên

            // file được thao tác: chỉ đọc, ghi ...
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r'); // chỉ muốn mở file ra để0 đọc

            // lần lượt đọc từng dòng trên file
            fgetcsv($csvFile); // đọc dòng đầu tiên nhưng k làm gì = bỏ qua dòng này (trong trường hợp có dòng tiêu đề)

            // sau khi bỏ qua dòng tiêu đề, duyệt để đọc các dòng dữ liệu phía dưới ok
            while (($line = fgetcsv($csvFile)) !== FALSE) { // đọc từng dòng và lưu vào biến $line: tệp có còn dòng nào không
                // mỗi dòng có nhiều cột truy cập từng cột và lưu lại vào các biến
                $name   = $line[0];
                $email  = $line[1];
                $phone  = $line[2];
                $status  = $line[3];
                // ?? sửa lại csdl
                // ktra dữ liệu lấy ra đã tòn tại trong csdl chưa
                $prevQuery = "SELECT id FROM members WHERE email = '" . $line[1] . "'";
                $prevResult = $db->query($prevQuery);

                if ($prevResult->num_rows > 0) { // nếu dữ liệu đã tồn tại => ta có thể update dữ liệu
                    // Update member data in the database
                    $db->query("UPDATE members SET name = '" . $name . "', phone = '" . $phone . "', status = '" . $status . "', modified = NOW() WHERE email = '" . $email . "'");
                } else { // nếu dữ liệu chưa tồn tại => thêm mới
                    // Insert member data in the databasename, email, phone, created, modified, status
                    $db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', NOW(), NOW(), '" . $status . "')");
                }
            }

            // đóng file
            fclose($csvFile);

            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else { 
        $qstring = '?status=invalid_file';
    }
}

// chuyển hướng về trang chủ trong trường hợp cả thành công hoặc không thành công
header("Location: index.php" . $qstring);
