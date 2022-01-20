// cần chuyển màu sắc all văn bản p ở vị trí chẵn

// JS
// B1: nhận diện các phần tử chúng ta sẽ tác động 

// let doanVan = document.getElementsByTagName("p");
// let btnClick = document.getElementById("btnClick");

// // B2: bắt sự kiện
// btnClick.addEventListener('click', function() {
//     for(let i = 0; i < doanVan.length; i++) {
//         // phần tử ở vị trí chẵn, chỉ số trong mảng là lẻ vì nó đánh số từ 0
//         if(i%2 != 0) {
//             doanVan[i].style.color='red';
//         }
//     }
// })

// sử dụng jquery để thay thế cho cách dùng js thuần
// 1. Jquery là 1 thư viện để sử dụng cần import
// thư viện jquery cần đặt trước script mình khai báo
// Học jquery: $(SELECTOR).ACTION(function(){})
// học khoảng 4 trang

$(document).ready(function() {
    // luon đảm bảo chỉ thực hiện nội dung bên trong khi trang web được tải xong DOM
    $("#btnClick").click(function() {
        $("p:eq(5)").css("color", "red");
        $("p:odd").css("color", "red");
        $("p:contains('doan van')").css("color", "red");
    })
})