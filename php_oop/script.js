// lập trình hướng đối tượng: object oriented programming
// 1. Lập trình: viết code và lập trình viên sẽ sử dụng phương pháp 
// lập trình hướng đối tượng OOP để viết code
// (code viết theo pp này dài hơn thông thươngf)

// 2. Hướng đối tượng là pp mô tả bài toán của kiểu lập trình này

// 3. Đặt nó trong sự so sánh với lập trình hướng cấu trúc (hướng thủ tục) thông qua 1 bài toán cụ thể

// Xét 1 bài toán cụ thể: viết 1 chương trình quản lý sinh viên thực hiện chức năng:
// - Nhập thông tin sv gồm: họ tên, ngày sinh, năm sinh, lớp 
// - Liệt kê ra các sv với các thông tin: họ tên, ngày sinh, tuổi, lớp

// Solution: theo pp lập trình  hướng cấu trúc

let dsSV = []; // mảng lưu trữ dssv

// Hàm thêm thông tin sinh viên vào mảng dssv
function themSV(hoTen, ngaySinh, lop) {
    // Thêm 1 đối tượng sv vào trong mảng
    let SinhVien = {
        hoTenSV: hoTen,
        ngaySinhSV: ngaySinh,
        lopSV: lop
    }
    dsSV.push(SinhVien);
}

function tinhtuoi(ngaysinh) {
    let namHienTai = new Date().getFullYear();
    return(namHienTai - ngaysinh);
}

function hienThiThongTin(SinhVien) {
    console.log('Họ và tên: ' + SinhVien.hoTenSV);
    console.log('Ngày sinh: ' + SinhVien.ngaySinhSV);
    console.log('Tuổi: ' + tinhtuoi(SinhVien.ngaySinhSV));
    console.log('Lớp: ' + SinhVien.lopSV);
    console.log('-------');
}

function lietKeDSSV() {
    for(let sv of dsSV) {
        hienThiThongTin(sv);
    }
}

// Gọi và thực thi chương trình
themSV("Trần Thảo Vân", "1999", "CSE485");
themSV("HETRIUEIE", 2001);

lietKeDSSV(); 
// ok