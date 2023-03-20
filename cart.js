let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".icon");
let closeCart = document.querySelector("#close-cart");

cartIcon.oneclick = () => {
    cart.classList.add("active");
};

closeCart.oneclick = () => {
    cart.classList.remove("active");
};

if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

function ready() {
    var removeCartButtons = document.getElementsByClassName("cart-remove");
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener("click", removeCartItem);
    }
    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
    var addCart = document.getElementsByClassName("add-cart");
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener("click", addCartClicked);
    }
}

function addCartClicked(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName("product-title")[0].innertext;
    var price = shopProducts.getElementsByClassName("price")[0].innertext;
    var productImg = shopProducts.getElementsByClassName("product-img")[0].src;
    addProductToCart(title, price, productimg);
    updatetotal();
}

function addProductToCart(title, price, productimg) {
    var cartShopBox = document.createElement("div");
    cartShopBox = document.createElement("cart-box");
    var cartItems = document.getElementsByClassName("cart-content");
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
    for (var i = 0; i < cartItemsNames.length; i++) {
        alert("You already have this item in cart");
        return;
    }
}

var cartBoxContent = `
                        <img src="${product-img}"
                            alt="" class="cart-img">
                        <div class="detail-box">
                            <div class="cart-product-title">${title}</div>
                            <div class="cart-price">${price}</div>
                            <input type="number" value="1" class="cart-quantity">
                        </div>
                        <i class="bx bx-trash-alt cart-remove"></i>`
cartShopBox.innerHTML = cartBoxContent;
cartItems.append(cartShopBox);
cartShopBox.getElementsByClassName("cart-remove")[0].addEventListener("click", removeCartItem);
cartShopBox.getElementsByClassName("cart-quantity")[0].addEventListener("change", quantityChanged);

document.getElementsByClassName("btn-buy")[0].addEventListener("click", buyButtonClicked);
function buyButtonClicked(){
    alert("Your order has been placed");
    var cartContent = document.getElementsByClassName("cart-content")[0];
    while(cartContent.hasChildNodes(cartContent.firstChild))
    {
        cartContent.removeChild(cartContent.firstChild);
    }
    updatetotal();
}


function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updatetotal();
}
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updatetotal();
}

function updatetotal() {
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName("cart-price")[0];
        var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
        var price = parseFloat(priceElement.innertext.replace("$", ""));
        var quantity = quantityElement.value;
        total = total + (price * quantity);
        total = Math.round(total * 100) / 100;
        document.getElementsByClassName("total-price")[0].innertext = "$" + total;
    }
}   

script.js


hamburger = document.querySelector('.hamburger');
hamburger.onclick = function () {
    navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active');
}

let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');

btn.onclick = function () {
    sidebar.classList.toggle('active');
};

// Register Page

const registerForm = document.getElementById('register-form');
const registerName = document.getElementById('register-name');
const registerEmail = document.getElementById('register-email');
const registerPassword = document.getElementById('register-password');

registerForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const nameValue = registerName.value.trim();
    const emailValue = registerEmail.value.trim();
    const passwordValue = registerPassword.value.trim();

    if (nameValue === '') {
        alert('Please enter your name.');
        registerName.focus();
        return false;
    }

    if (emailValue === '') {
        alert('Please enter your email address.');
        registerEmail.focus();
        return false;
    }

    if (passwordValue === '') {
        alert('Please enter your password.');
        registerPassword.focus();
        return false;
    }

    // Here you would typically send the name, email, and password to the server for registration
    // and redirect the user to the appropriate page based on the server's response.
    // For this example, we'll just log the values to the console and refresh the page.

    console.log(`Name: ${nameValue}`);
    console.log(`Email: ${emailValue}`);
    console.log(`Password: ${passwordValue}`);
    registerForm.reset();
});


// Login Page

const loginForm = document.getElementById('login-form');
const loginEmail = document.getElementById('login-email');
const loginPassword = document.getElementById('login-password');

loginForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const emailValue = loginEmail.value.trim();
    const passwordValue = loginPassword.value.trim();

    if (emailValue === '') {
        alert('Please enter your email address.');
        loginEmail.focus();
        return false;
    }

    if (passwordValue === '') {
        alert('Please enter your password.');
        loginPassword.focus();
        return false;
    }

    // Here you would typically send the email and password to the server for validation
    // and redirect the user to the appropriate page based on the server's response.
    // For this example, we'll just log the values to the console and refresh the page.

    console.log(`Email: ${emailValue}`);
    console.log(`Password: ${passwordValue}`);
    loginForm.reset();
});
 
// Add to cart
