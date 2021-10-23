const SpecToggle = document.querySelector('.desct-item-spec');
const DescToggle = document.querySelector('.desct-item-desc');
const ReviewToggle = document.querySelector('.desct-item-review');

const scecifications = document.querySelector('.scecifications');
const description = document.querySelector('.description');
const reviews = document.querySelector('.reviews');



function SpecToggleOn(){
    scecifications.classList.remove('d-none');
    SpecToggle.parentNode.classList.add('active');
   
    description.classList.add('d-none');
    DescToggle.parentNode.classList.remove('active');

    reviews.classList.add('d-none');
    ReviewToggle.parentNode.classList.remove('active');
}
function DescToggleOn(){
    description.classList.remove('d-none');
    DescToggle.parentNode.classList.add('active');

    scecifications.classList.add('d-none');
    SpecToggle.parentNode.classList.remove('active');

    reviews.classList.add('d-none');
    ReviewToggle.parentNode.classList.remove('active');
}
function ReviewToggleOn(){
    reviews.classList.remove('d-none');
    ReviewToggle.parentNode.classList.add('active');

    description.classList.add('d-none');    
    DescToggle.parentNode.classList.remove('active');

    scecifications.classList.add('d-none');
    SpecToggle.parentNode.classList.remove('active');
}
if(typeof(localStorage.getItem('active')) != "undefined" && localStorage.getItem('active') !== null) {
    switch(parseInt(localStorage.getItem('active'))){
        case 1: SpecToggleOn(); break;
        case 2: DescToggleOn(); break;
        case 3: ReviewToggleOn(); break;
    }
}
else{
    SpecToggleOn()
}


SpecToggle.addEventListener('click', () => {SpecToggleOn(); localStorage.setItem('active', 1)});
DescToggle.addEventListener('click', () => {DescToggleOn();  localStorage.setItem('active', 2)});
ReviewToggle.addEventListener('click', () => {ReviewToggleOn(); localStorage.setItem('active', 3)});
