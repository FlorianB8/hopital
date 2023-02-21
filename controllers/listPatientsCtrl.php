<?php 
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../config/functions.php');

try {
    $patients = Patient::getAll();
} catch (\Throwable $th) {
    $errorMessage = 'Une erreur est survenue lors de la récupération des patients !';
    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/error.php');
    include(__DIR__ . '/../views/templates/footer.php');
    die;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patient/listPatients.php');
include(__DIR__ . '/../views/templates/footer.php');
