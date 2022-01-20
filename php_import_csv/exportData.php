<?php 
 
// Nạp file cấu hình kết nối csdl
include_once 'dbConfig.php'; 
 
// truy vấn và lấy ra dữ liệu đang có từ bảng memebers và lưu vào biến $quyery 
$query = $db->query("SELECT * FROM members ORDER BY id ASC"); 
 
if($query->num_rows > 0){ // ktra có dữ liệu thì đọc
    $delimiter = ","; // xác định dấu phân tách các cột sau này khi ghi vào file
    $filename = "members-data_" . date('Y-m-d') . ".csv"; // tên tệp tin mà bạn dịnh xuất ra sau này
     
    // con trỏ tệp tin xác định chế độ sẽ thực hiện ghi tệp 
    $f = fopen('php://memory', 'w'); 
     
    // nếu tệp tin ghi có cột tiêu đề -> xác định cấu trúc cột tiêu đề
    $fields = array('ID', 'NAME', 'Em', 'EMAIL', 'GENDER', 'COUNTRY', 'CREATED', 'STATUS'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['gender'], $row['country'], $row['created'], $status); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>