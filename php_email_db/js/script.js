$(document).ready(function() {
    // client: kiểm tra tính hợp lệ của email
    $("#email").change(function() {
        let emailPattern = /^[0-9]{10}(@e.tlu.edu.vn)$/;
        if(emailPattern.test($(this).val()) == false) { // client
            $("#emailHelp").text("Email khong hop le").css("color","red");
        } else { // server 
            $.ajax({
                url: "processRegister.php",
                type: "post",
                data: {email:$(this).val(), name:$("#name").val(), password:$("#password").val()},
                
                // callback function
                success: function(res) {
                    $("#emailHelp").text(res).css("color","green");
                }
            })
        }
// chưa nhảy vào server
        // server: gửi dữ liệu về server để kiểm tra và phản hồi nếu có lỗi
        // cách Non Ajax: gửi qua action="processRegister.php" method="post"
        // chỉ thực hiện khi nhấn submit

        // 1. cách dùng ajax: tôi không cần submit, chỉ cần rời khỏi ô nhập là sẽ gửi

    })
})