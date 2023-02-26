import * as bootstrap from 'bootstrap';

AOS.init();

/* ---- Scroll Down Button ---- */
$(function() {
  $('scroll-down').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 700, 'linear');
  });
});   

/* ---- Toggle burger button to hide header-image ---- */
let burgerToggle = document.querySelector('.navbar-toggler');
let headerTitle = document.querySelector('.header-title');
let headerContent = document.querySelector('.header-content');
let headerMedia = document.querySelector('.header-media');
burgerToggle.addEventListener("click", () => {
  if (window.screen.width <= 576)
  headerContent.classList.toggle('d-none');
  headerTitle.classList.toggle('d-none');
  headerMedia.classList.toggle('d-none');
})

/* ---- Toggle hamburger open/close button ---- */
let burgerLines = document.querySelector('.navbar-toggler-icon');
let burgerClose = document.querySelector('.bi-x-lg');

burgerToggle.addEventListener("click", () => {
  burgerLines.classList.toggle('burger-hide');
  burgerClose.classList.toggle('close-shown');
})

// Example starter JavaScript for disabling form submissions if there are invalid fields

let forms = document.querySelectorAll('.needs-validation');

Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      } 

      form.classList.add('was-validated')
    }, false)
  })


      
