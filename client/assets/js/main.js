// search form
let searchForm = document.querySelector('.search-form-container');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    cart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    aboutProduct.classList.remove('active');
    registerForm.classList.remove('active');
}


// shopping cart
let cart = document.querySelector('.shopping-cart-container');

document.querySelector('#cart-btn').onclick = () => {
    cart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    aboutProduct.classList.remove('active');
    registerForm.classList.remove('active');
}


// login form
let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () => { 
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    cart.classList.remove('active');
    navbar.classList.remove('active');
    aboutProduct.classList.remove('active');
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

// about product
// let aboutProduct = document.querySelector('.about-product');

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
            alert("Thêm vào giỏ hàng thành công!");
            $('#showCart').html(result);
        } 
    });
    // tinh tong tien
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
    // tinh tong tien
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
}

//edit so luong trong cart
function editSL(mshh, newSL) {
    // if(newSL > maxSL){
    //     newSL = maxSL;
    // }
    $.ajax({
        type: "post",
        url: "./control/Cart_Controller.php",
        data: {
            mshh: mshh,
            newSL: newSL,
            editSL: true, 
        },
        success: function(result) {
            $('#showCart').html(result);
        } 
    });
    // tinh tong tien
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

