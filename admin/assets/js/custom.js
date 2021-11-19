

var path = window.location.href;
$('.sidebar-item a').each(function() {
    if (this.href === path) {
        $(this).parent().addClass('active');
    }
});

$('.close').on('click',function(){
    $('.thongbao_fail').css({"display":"none"});
    $('.thongbao_success').css({"display":"none"});
});


// add modal product
$('#addBtn').on('click', function() {
    $('#addModal').css({"display":"block"});
});

$('#add-exitBtn').on('click', function() {
    $('#addModal').css({"display":"none"});
});

// add modal type product
$('.addType').on('click', function() {
    $('#addModal-type').css({"display":"block"});
});

$('#add-exitBtn').on('click', function() {
    $('#addModal-type').css({"display":"none"});
});


//register
$('#register_staff #sdt').on('change', function() {
    var sdt = $('#register_staff #sdt').val();
    $.ajax({
        type: "post",
        url: "./xacnhan_sdt.php",
        data: {
            sdt: sdt,
        },
        success: function(result){
            $('#check_sdt').html(result);
        }
    });
});

$('#register_staff').submit(function() {
    var check_submit = false;

    if($('#register_staff #pass').val() != $('#register_staff #repass').val()){
        $('#error_repass').html('Mật khẩu xác nhận chưa đúng!');
        check_submit = false;
    }else{
        check_submit = true;
    }
    if($('#comfirm_sdt').html() == 'Số điện thoại có thể sử dụng'){
        check_submit = true;
    }else{
        check_submit = false;
    }
    return check_submit;
});




