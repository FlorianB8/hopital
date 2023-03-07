<?php
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../helpers/dd.php');
require_once(__DIR__ . '/../config/flash.php');

$patients = Patient::getAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    $select = trim(filter_input(INPUT_POST, 'patients', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($select)){
        $error['select'] = 'Veuillez renseigner un patient';
    }else {
        $validateSelect = filter_var($select, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_ID . '/')));
        if(!$validateSelect){
            $error['select'] = 'Veuillez renseigner un patient valide';
        }
    }

    // * Vérification de l'input date de naissance
    $datehour = trim(filter_input(INPUT_POST, 'datehour', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($datehour)) {
        $month = date('m', strtotime($datehour));
        $day = date('d', strtotime($datehour));
        $year = date('Y', strtotime($datehour));
        $isDateOk = checkdate($month, $day, $year);
        if (!$isDateOk && (strtotime($datehour) < strtotime('now'))) {
            $error['datehour'] = 'Veuillez renseigner une date valide';
        }
        if(Appointment::isDatehourExist(date('Y-m-d H:i:s',strtotime($datehour)))){
            $error['datehour'] = 'Veuillez renseigner une date libre';
        }
    }
    // * -----------------------------

    if(empty($error)){
        $appointment = new Appointment();
        $appointment->setDateHour(date('Y-m-d H:i:s', strtotime($datehour)));
        $appointment->setidPatient($select);
        $result = $appointment->add();
        if($result === true){
            $flash = new Flash('Rendez-vous ajouté avec succés !','success');        
        }else {
            $flash = new Flash('Rendez-vous déjà existant','danger');        
        }
    }
}




include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patient/addPatientAppointment.php');
include(__DIR__ . '/../views/templates/footer.php');
