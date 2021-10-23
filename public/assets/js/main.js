const editProfileButton = document.querySelector('.edit_profile_button');
const editInputValue = document.querySelectorAll('.edit_input_value');
const editLabelValue = document.querySelectorAll('.edit_label_value');
const editImageValue = document.querySelector('#image');
const editSubmit = document.querySelector('.edit-submit');
const lcEdit = document.querySelector('.lc-edit');
const lcCancel = document.querySelector('.lc-cancel');
const cartQuantity = document.querySelector('.cart-quantity');

function cart() {
    cartQuantity.classList.add('d-none');
    console.log(cartQuantity);
}

$(document).ready(function() {
    cart()
})


const LCon = function(){
    editInputValue.forEach(element => {
        element.classList.add('ready-edit');
        element.classList.add('col-9');
        element.readOnly = false;
    });
    editLabelValue.forEach(element => {
        element.classList.add('ready-edit-label');
    });
    editSubmit.classList.add('ready-submit');
    editProfileButton.classList.add('d-none');
    editImageValue.classList.remove('d-none');
    $( function() {
        $( "#birthdate" ).datepicker({
            dateFormat: "yy-mm-dd"
          });
    } )
}
const LCoff = function(){
    editInputValue.forEach(element => {
        element.classList.remove('ready-edit');
        element.classList.remove('col-9');
        element.readOnly = true;
    });
    editLabelValue.forEach(element => {
        element.classList.remove('ready-edit-label');
    });
    editImageValue.classList.add('d-none');
    editSubmit.classList.remove('ready-submit');
    editProfileButton.classList.remove('d-none');
    $( function() {
        $( "#birthdate" ).datepicker('destroy');
    } )
}





editProfileButton.addEventListener('click', LCon);

lcEdit.addEventListener('click', LCoff);
lcCancel.addEventListener('click', LCoff);
