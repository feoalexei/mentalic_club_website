let agreementForm = document.getElementById('agreement-form');
let formBtn = document.querySelector('.form__btn');

let addBtnChild = document.querySelector('.add__btn--child');
let addBtnOsoba = document.querySelector('.add__btn--osoba');

let addLabelChild = document.querySelector('.add__label--child');
let addLabelOsoba = document.querySelector('.add__label--osoba');

let addedChild = document.querySelector('.added__child');
let addedOsoba = document.querySelector('.added__osoba');

formBtn.addEventListener("click", () => {
    agreementForm.classList.remove('d-none');
    agreementForm.scrollIntoView(top);
})

addBtnChild.addEventListener("click", () => {
  addedChild.classList.toggle('d-none');
  console.log("why?");
  addBtnChild.textContent === "Видалити" ? 
  addBtnChild.textContent = "Додати" : addBtnChild.textContent = "Видалити";
  addLabelChild.textContent === "Видалити ще одну дитину" ? 
  addLabelChild.textContent = "Додати ще одну дитину" : 
  addLabelChild.textContent = "Видалити ще одну дитину";
})

addBtnOsoba.addEventListener("click", () => {
    addedOsoba.classList.toggle('d-none');
    addBtnOsoba.textContent === "Видалити" ? 
    addBtnOsoba.textContent = "Додати" : addBtnOsoba.textContent = "Видалити";
    addLabelOsoba.textContent === "Видалити ще одну уповноважену особу" ? 
    addLabelOsoba.textContent = "Додати ще одну уповноважену особу" : addLabelOsoba.textContent = "Видалити ще одну уповноважену особу";
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


  