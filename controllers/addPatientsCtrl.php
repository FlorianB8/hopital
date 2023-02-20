<?php
require_once(__DIR__ . '/../models/Connect.php');
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../helpers/dd.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    
    // * Vérification de l'input email 
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Champ obligatoire';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Adresse mail non valide';
        }
    }
    // * -----------------------------
    
    // * Vérification de l'input prénom 
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($firstname)) {
        $error['firstname'] = 'Champ obligatoire';
    } else {
        $validatefirstname = filter_var($firstname, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validatefirstname) {
            $error['firstname'] = 'Prénom non valide';
        }
    }
    
    // * Vérification de l'input nom 
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($lastname)) {
        $error['lastname'] = 'Champ obligatoire';
    } else {
        $validatelastname = filter_var($lastname, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validatelastname) {
            $error['lastname'] = 'Nom non valide';
        }
    }
    // * -----------------------------
    
    // * Vérification de l'input date de naissance
    $birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($birthdate)) {
        $month = date('m', strtotime($birthdate));
        $day = date('d', strtotime($birthdate));
        $year = date('Y', strtotime($birthdate));
        $isDateOk = checkdate($month, $day, $year);
        if (date('Y') - $year < 0 && date('Y') - $year > 120) {
            $error['birthdate'] = 'Date de naissance non valide';
        }
    }
    // * -----------------------------
    
    // * Vérification de l'input tel
    $phonenumber = trim(filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($phonenumber)) {
        $validatePhoneNumber = filter_var($phonenumber, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEL . '/')));
        if(!$validatePhoneNumber){
            $error['phonenumber'] = 'Numéro de téléphone non valide';
        }
    }
    // * -----------------------------
    if(empty($error)) {
        // dd($lastname, $firstname, $email, $phonenumber, $birthdate);
        $patient = new Patient($lastname, $firstname, $email, $phonenumber, $birthdate);
        $patient->addPatient();
    }
}




require_once(__DIR__ . '/../views/templates/header.php');
require_once(__DIR__ . '/../views/addPatient.php');
require_once(__DIR__ . '/../views/templates/footer.php');
