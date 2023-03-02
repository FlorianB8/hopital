<?php
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/flash.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    
    // * Vérification de l'input email 
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Veuillez renseigner votre adresse mail';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Veuillez renseigner une adresse mail valide';
        }
    }
    // * -----------------------------
    
    // * Vérification de l'input prénom 
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($firstname)) {
        $error['firstname'] = 'Veuillez renseigner votre prénom';
    } else {
        $validatefirstname = filter_var($firstname, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validatefirstname) {
            $error['firstname'] = 'Veuillez renseigner un prénom valide';
        }
    }
    
    // * Vérification de l'input nom 
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($lastname)) {
        $error['lastname'] = 'Veuillez renseigner votre nom';
    } else {
        $validatelastname = filter_var($lastname, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEXT . '/')));
        if (!$validatelastname) {
            $error['lastname'] = 'Veuillez renseigner un nom valide';
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
            $error['birthdate'] = 'Veuillez renseigner une date de naissance valide';
        }
    }
    // * -----------------------------
    
    // * Vérification de l'input tel
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($phone)) {
        $validatephone = filter_var($phone, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_TEL . '/')));
        if(!$validatephone){
            $error['phone'] = 'Veuillez renseigner un numéro de téléphone valide';
        }
    }
    // * -----------------------------
    if(empty($error)) {
        $patient = new Patient();
        $patient->setFirstname($firstname);
        $patient->setLastname($lastname);
        $patient->setEmail($email);
        $patient->setPhone($phone);
        $patient->setBirthdate($birthdate);
        $result = $patient->add();
        if($result === true){
            $flash = new Flash('Patient ajouté avec succés !','success');        
        }else {
            $flash = new Flash('Email déjà existant','danger');        
        }
    }
}




include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patient/addPatient.php');
include(__DIR__ . '/../views/templates/footer.php');
