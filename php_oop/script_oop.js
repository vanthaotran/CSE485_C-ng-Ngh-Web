// Định nghĩa 1 lớp đối tượng sinhvien

class SinhVien {
    // định nghĩa hàm tạo
    constructor  (hoTen, namSinh, lop) {
        this.tenSV = hoTen;
        this.namSinhSV = namSinh;
        this.lopSV = lop;
    }

    tinhTuoi() {
        let namHienTai = new Date().getFullYear();
        return(namHienTai - this.namSinhSV);
    }

    hienThiThongTin() {
        console.log('Họ và tên: ' + this.hoTenSV);
        console.log('Ngày sinh: ' + this.namSinhSV);
        console.log('Tuổi: ' + tinhtuoi(this.ngaySinhSV));
        console.log('Lớp: ' + this.lopSV);
        console.log('-------');
    }
}

class QuanLySV {
    constructor() {
        this.dsSV = [];
    }

    themSinhVien(sinhvien) {
        this.dsSV.push(sinhvien);
    }

    lietKeDanhSachSV() {
        for(let sv of this.dsSV){
            sv.hienThiThongTin();
        }
    }
}

// sử dụng các đối tượng
let sv01 = new SinhVien("TTV", 2001, "cse2001")
let sv02 = new SinhVien("TTTTTT", 2000, "cse2000")

let nguoiQuanLy = new QuanLySV();
nguoiQuanLy.themSinhVien(sv01);
nguoiQuanLy.themSinhVien(sv02);

nguoiQuanLy.lietKeDanhSachSV();

console.log('sao lai khong nhan');