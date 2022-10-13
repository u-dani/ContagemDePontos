
/* Bom Dia */

const inputs = document.querySelectorAll('.input-form');
const submit = document.querySelector('.btn-submit');

function inputFocus({target}) {
    const span = target.previousElementSibling;
    span.classList.add('span-focus');
}

function inputFocusOut({target}){
    if (target.value == '') {
        const span = target.previousElementSibling;
        span.classList.remove('span-focus');
    }
}

function inputValidar() {
    if (inputs[0].value.length > 2 && inputs[1].value.length > 7) {
        submit.removeAttribute('disabled');
    } else {
        submit.setAttribute('disabled', '');
    }
}

inputs.forEach((input)=>{
    input.addEventListener('focus', inputFocus);
    input.addEventListener('focusout', inputFocusOut);
    input.addEventListener('input', inputValidar);
})