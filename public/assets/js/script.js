let btnModify = document.getElementById('btnModify');
let btnValidate = document.getElementById('btnValidate');
let inputLastname = document.getElementById('inputLastname');
let inputFirstname = document.getElementById('inputFirstname');
let inputMail = document.getElementById('inputMail');
let inputBirthdate = document.getElementById('inputBirthdate');
let inputPhone = document.getElementById('inputPhone');

btnModify.addEventListener('click', () => {
    if(btnValidate.hasAttribute('hidden')){
        btnModify.toggleAttribute('hidden');
        btnValidate.toggleAttribute('hidden');
        inputLastname.removeAttribute('readonly');
        inputFirstname.removeAttribute('readonly');
        inputMail.removeAttribute('readonly');
        inputBirthdate.removeAttribute('readonly');
        inputPhone.removeAttribute('readonly');
        inputLastname.classList.toggle('profilInputActive');
        inputFirstname.classList.toggle('profilInputActive');
        inputMail.classList.toggle('profilInputActive');
        inputBirthdate.classList.toggle('profilInputActive');
        inputPhone.classList.toggle('profilInputActive');
        inputLastname.classList.toggle('profilInput');
        inputFirstname.classList.toggle('profilInput');
        inputMail.classList.toggle('profilInput');
        inputBirthdate.classList.toggle('profilInput');
        inputPhone.classList.toggle('profilInput');
    }
    // }else if(btnModify.hasAttribute('hidden') ) {
    //     btnModify.toggleAttribute('hidden');
    //     btnValidate.toggleAttribute('hidden');
    //     inputLastname.setAttribute('readonly', '');
    //     inputFirstname.setAttribute('readonly', '');
    //     inputMail.setAttribute('readonly', '');
    //     inputBirthdate.setAttribute('readonly', '');
    //     inputPhone.setAttribute('readonly', '');
    // }
})