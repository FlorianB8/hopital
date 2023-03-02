let btnModify = document.getElementById('btnModify');
let btnValidate = document.getElementById('btnValidate');
let inputLastname = document.getElementById('inputLastname');
let inputFirstname = document.getElementById('inputFirstname');
let inputMail = document.getElementById('inputMail');
let inputBirthdate = document.getElementById('inputBirthdate');
let inputPhone = document.getElementById('inputPhone');
let inputIdPatient = document.getElementById('inputIdPatient');
let inputDateHour = document.getElementById('inputDateHour');

let btnModifyAppointment = document.getElementById('btnModifyAppointment');
let btnValidateAppointment = document.getElementById('btnValidateAppointment');

if (btnModify) {
    btnModify.addEventListener('click', () => {
        if (btnValidate.hasAttribute('hidden')) {
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

    })
}

if (btnModifyAppointment) {

    btnModifyAppointment.addEventListener('click', () => {
        if (btnValidateAppointment.hasAttribute('hidden')) {
            btnValidateAppointment.toggleAttribute('hidden');
            btnModifyAppointment.toggleAttribute('hidden');
            inputDateHour.removeAttribute('readonly');
            inputDateHour.classList.toggle('profilInputActive');
        }

    })

}
let table = document.getElementById('table');
// Fonction pour les data tables
$(document).ready(function () {
    $('#table').DataTable();
});