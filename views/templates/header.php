<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <title>Hopital</title>
</head>
<body>
    <header>
        <div class="container-fluid header text-center">
            <div class="row bgDarkGreen textLight">
                <nav class="navbar navbar-expand-lg p-0">
                    <div class="container-fluid">
                        <button type="button" class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <!-- Lien vers chaque page -->
                            <ul class="d-flex me-auto mt-3 my-4 navbar-nav">
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/">Accueil</a> </li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="../../controllers/addPatientsCtrl.php">Ajout patient</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/controllers/listPatientsCtrl.php">Liste patient(s)</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/controllers/exercice4Ctrl.php">Ajout rendez-vous</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/controllers/exercice5Ctrl.php">Liste rendez-vous</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/controllers/exercice6Ctrl.php">Ajout patient rendez vous</a></li>
                            </ul>
                            <!-------------------------->
                            <h1 class="mx-4 m-2 textLight ms-auto"><i class="fa-solid fa-hospital"></i></h1>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </header>