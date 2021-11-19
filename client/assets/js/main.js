// search form
let searchForm = document.querySelector('.search-form-container');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    cart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    // aboutProduct.classList.remove('active');
    registerForm.classList.remove('active');
}


// shopping cart
let cart = document.querySelector('.shopping-cart-container');

document.querySelector('#cart-btn').onclick = () => {
    cart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    // aboutProduct.classList.remove('active');
    registerForm.classList.remove('active');
}


// login form
let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () => { 
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    cart.classList.remove('active');
    navbar.classList.remove('active');
    // aboutProduct.classList.remove('active');
    registerForm.classList.remove('active');
}


//navigation bar
let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    cart.classList.remove('active');
    aboutProduct.classList.remove('active');
    registerForm.classList.remove('active');
}


window.onscroll = () => {
    navbar.classList.remove('active');
}

$('#user-drop').on("click", function(){
    $('.user-dropdown-content').toggle("show");
});

// show chi tiết
$('.menu-img').each(function(){
    $(this).click(function(){
        $('.about-product').toggleClass('active');
    });
});

$('.popular-img').each(function() {
    $(this).click(function() {
        $('.about-product').toggleClass('active');
    });
});

$('#product-icon').click(function(){
    $('.about-product').toggleClass('active');
});

//register form
let registerForm = document.querySelector('.register-form-container');

$('#register').click(function() {
    $('.register-form-container').toggleClass('active');
});


//Add cart
function addCart(mshh, slHang) {

    $.ajax({
        type: "post",
        url: "./control/Cart_Controller.php",
        data: {
            mshh: mshh,
            slHang: slHang,
            addCart: true,  
        },
        success: function(result) {
            $('#showCart').html(result);
        } 
    });
}

//delete cart
function deleteCart(mshh) {
    $.ajax({
        type: "post",
        url: "./control/Cart_Controller.php",
        data: {
            mshh: mshh,
            deleteCart: true,  
        },
        success: function(result) {
            $('#showCart').html(result);
        } 
    });
}

$.ajax({
    type: "post",
    url: "./control/Cart_Controller.php",
    data: {
        total: true, 
    },
    success: function(result) {
        $('#value-total').html(result);
    } 
});

function minusProduct(mshh) {
    var slmua = $('#sl_product_cart'+mshh).val();
    
    if (slmua >1){
        slmua--;
        $('#sl_product_cart'+mshh).val(slmua);
        $.ajax({
            type: "post",
            url: "./control/Cart_Controller.php",
            data: {
                mshh: mshh,
                newSL: slmua,
                editSL: true, 
            },
            success: function(result) {
                $('#showCart').html(result);
            } 
        });
    }
}

function plusProduct(mshh, max_sl){
    let slmua = $('#sl_product_cart'+mshh).val();
    
    if (slmua < max_sl){
        slmua++;
        $('#sl_product_cart'+mshh).val(slmua);
        $.ajax({
            type: "post",
            url: "./control/Cart_Controller.php",
            data: {
                mshh: mshh,
                newSL: slmua,
                editSL: true, 
            },
            success: function(result) {
                $('#showCart').html(result);
            } 
        });
    } 
}

//Chọn nhập địa chỉ mới
$('#toggle_newaddress').on("click", function(){
    //Bật tắt thẻ select và input
    $('#old_address').css({"display": "none"});
    $('#new_address').css({"display": "inline-block"});

    //gán disabled cho thẻ
    $('#old_address').attr("disabled", true);//disabled địa chỉ cũ
    $('#new_address').attr("disabled", false);//mở địa chỉ mới
    $('#new_address').attr("required", true);//Bắt buộc nhập

    //Nút chuyển đổi
    $('#toggle_newaddress').css({"display":"none"});
    $('#toggle_oldaddress').css({"display":"inline"});
});
//Chọn địa chỉ củ
$('#toggle_oldaddress').on("click", function(){
    //Bật tắt thẻ select và input
    $('#old_address').css({"display": "inline-block"});
    $('#new_address').css({"display": "none"});
    
    //gán disabled cho thẻ
    $('#old_address').attr("disabled", false);//mởf địa chỉ cũ
    $('#new_address').attr("disabled", true);//disabled địa chỉ mới

    //Nút chuyển đổi
    $('#toggle_newaddress').css({"display":"inline"});
    $('#toggle_oldaddress').css({"display":"none"});
});

//Detail Product
function showDetail(mshh){
    $('.about-product').toggleClass('active');
    $.ajax({
        type: "post",
        url: "./control/Product_Controller.php",
        data: {
            mshh: mshh, 
        },
        success: function(result) {
            $('#show_detail_product').html(result);
        } 
    });
}

function dathang_login(){
    alert("Hãy đăng nhập để đặt hàng!");
}

// tìm kím hàng hóa
function search() {
    var keyword = $('#search-box').val();
    if (keyword.length < 1) {
        $('#search-box').attr("placeholder","Nhập vào từ khóa để tìm kiếm");
    }
    else {
        $.ajax({
            type: "post",
            url: "./control/Search_Controller.php",
            data: {
                keyword: keyword, 
            },
            success: function(result) {
                $('#showSearch').html(result);
            } 
        });
    }
    return false;
}

// check register
function checkRegister() {
    var sdt = $('#user-num').val();
    $.ajax({
        type: "post",
        url: "./control/Confirm_sdt.php",
        data: {
            sdt: sdt, 
        },
        success: function(result) {
            $('#check_sdt').html(result);
        } 
    });
}

$('#register_customer').submit(function(){
    var check_submit = false;

    if($('#register_customer #user-pass').val() != $('#register_customer #user-repass').val()){
        $('#check_repass').html('&#42; Mật khẩu xác nhận chưa đúng!');
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