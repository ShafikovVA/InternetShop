const cartQuantity = document.querySelector('.cart-quantity');


$(document).ready(function() {
    if(cartQuantity.textContent === ''){
        cartQuantity.classList.add('d-none');
    }
})