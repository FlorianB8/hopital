<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="/public/assets/js/datatables.js" />
    <!-- <script src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> -->
    <title>Hopital</title>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher&nbsp;:",
                    lengthMenu: "",
                    info: "",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de MAX &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first: "Premier",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script> -->
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
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/accueil">Accueil</a> </li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/ajoutPatient">Ajout patient</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/listePatient">Liste patient(s)</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/ajoutRendezVous">Ajout rendez-vous</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/listeRendezVous">Liste rendez-vous</a></li>
                                <li class="mx-4 nav-item nav-link"><a class="linkPage" href="/ajoutPatientRendezVous">Ajout patient rendez vous</a></li>
                            </ul>
                            <!-------------------------->
                            <h1 class="mx-4 m-2 textLight ms-auto"><i class="fa-solid fa-hospital"></i></h1>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </header>