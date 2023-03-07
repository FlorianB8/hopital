<?php 
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../config/functions.php');
require_once(__DIR__. '/../helpers/dd.php');

if(isset($_GET['idPatient']) && isset($_GET['idAppointment'])){
    $idPatient = $_GET['idPatient'];
    $idAppointment = $_GET['idAppointment'];
    // dd($appointments = Appointment::delete($id));
    try {
        // Appel de la méthode statique getAll() qui permet de récupérer tout les patients
        $appointments = Appointment::delete($idPatient,$idAppointment );
    } catch (\Throwable $th) {
        $errorMessage = 'Une erreur est survenue lors de la récupération des patients !';
        include(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/templates/error.php');
        include(__DIR__ . '/../views/templates/footer.php');
        die;
    }
}

try {
    if(isset($_GET['search'])){
        $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
        $querySearch = "WHERE `patients`.`lastname` LIKE '%$search%' OR `patients`.`firstname` LIKE '%$search%' OR `patients`.`mail` LIKE '%$search%' OR `dateHour` LIKE '%$search%' OR `idPatients` LIKE '%$search%' ";
        $appointments = Appointment::getAll($querySearch);
        if(empty($appointments)){
            $emptyMessage = "Aucun rendez-vous ne correspond à la recherche.";
        }
    } else {
        // Appel de la méthode statique getAll() qui permet de récupérer tout les patients
        $appointments = Appointment::getAll();
    }
    // Appel de la méthode statique getAll() qui permet de récupérer tout les patients
} catch (\Throwable $th) {
    $errorMessage = 'Une erreur est survenue lors de la récupération des patients !';
    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/error.php');
    include(__DIR__ . '/../views/templates/footer.php');
    die;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/appointment/listAppointments.php');
include(__DIR__ . '/../views/templates/footer.php');
