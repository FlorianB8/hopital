<?php
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../config/functions.php');
require_once(__DIR__ . '/../config/flash.php');
require_once(__DIR__ . '/../helpers/dd.php');

$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];


    // * Vérification de l'input date de naissance
    $datehour = filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($datehour)) {
        $month = date('m', strtotime($datehour));
        $day = date('d', strtotime($datehour));
        $year = date('Y', strtotime($datehour));
        $hour = date('H', strtotime($datehour));
        $min = date('i', strtotime($datehour));
        $sec = date('s', strtotime($datehour));
        $isDateOk = checkdate($month, $day, $year);
        if (strtotime($datehour) < strtotime(date('Y-m-d'))) {
            $error['datehour'] = 'Veuillez renseigner une date de rendez-vous valide';
        }
        if(Appointment::isDatehourExist(date('Y-m-d H:i:s',strtotime($datehour)))){
            $error['datehour'] = 'Veuillez renseigner une date libre';
        }
    }
    // * -----------------------------

    if(empty($error)){
        $appointment = new Appointment();
        $appointment->setDateHour(date('Y-m-d H:i:s', strtotime($datehour)));
        $appointment->setidPatient($id);
        $result = $appointment->update($id);
        if($result === true){
            $flash = 'Rendez-vous modifié avec succés !';
            $type = 'success';        
        }else {
            $flash = 'Rendez-vous déjà existant';
            $type = 'danger';
        }
    }
}

try {
    $appointment = new Appointment();
    $appointment = Appointment::get($id);
    $patients = Patient::getAll();
} catch (\Throwable $th) {
    $errorMessage = 'Une erreur est survenue lors de la récupération du patient !';
    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/error.php');
    include(__DIR__ . '/../views/templates/footer.php');
    die;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/appointment/profilAppointment.php');
include(__DIR__ . '/../views/templates/footer.php');
