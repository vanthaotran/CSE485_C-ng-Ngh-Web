<?php
    class SinhVien
    {
        // khai báo thuộc tính và phạm vi truy cập
        private $hoTenSV;
        private $namSinh;
        private $lop;

        function __construct($hoTen, $namSinh, $lop)
        {
            $this->hoTenSV = $hoTen;
            $this->namSinh = $namSinh;
            $this->lop = $lop;
        } 

        function tinhTuoi()
        {
            $namHienTai = date("Y");
            return ($namHienTai = $this->namSinh);
        }

        function hienThiThongTin()
        {
            echo ('Họ và tên: ' . $this->hoTenSV) . "<br>";
            echo ('Ngày sinh: ' . $this->namSinh) . "<br>";
            echo ('Tuổi: ' . $this->tinhTuoi()) . "<br>";
            echo ('Lớp: ' . $this->lop) . "<br>";
            echo ('-------');
        }
    }
    ?>