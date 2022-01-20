<?php
    // kết nối db, tái sử dụng
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "demo_userregistration";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:');
        }
?>