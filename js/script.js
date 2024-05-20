let menu = document.querySelector('.header .menu');

document.querySelector('#menu-btn').onclick = () =>{
   menu.classList.toggle('active');
}

window.onscroll = () =>{
   menu.classList.remove('active');
}

document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
   inputNumber.oninput = () =>{
      if(inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
   };
});

document.querySelectorAll('.faq .box-container .box h3').forEach(headings =>{
   headings.onclick = () =>{
      headings.parentElement.classList.toggle('active');
   }
});
 // JavaScript to toggle the menu on small screens
 const menuBtn = document.getElementById('menu-btn');
 const menu = document.querySelector('.menu');

 menuBtn.addEventListener('click', () => {
    menu.classList.toggle('active');
 });
 // Mobile menu functionality
const menuBtn = document.getElementById('menu-btn');
const menu = document.querySelector('.menu');

menuBtn.addEventListener('click', () => {
    menu.classList.toggle('active');
});
// Get the menu button and navigation bar
const menuBtn = document.querySelector('.menu-btn');
const navbar = document.querySelector('.navbar');

// Toggle navigation bar on menu button click
menuBtn.addEventListener('click', () => {
   navbar.classList.toggle('show-nav');
});