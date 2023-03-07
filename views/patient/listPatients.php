<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <h2 class="text-center mt-5">Liste des patient(s)</h2>
                <hr class="mx-auto w-75">
                <form action="" method="get">
                    <input class="input-form" autocomplete="off" type="search" name="search" id="search" placeholder="Votre recherche...">
                    <input class="input-form" type="submit" value="Rechercher">
                </form>
                <table id="table" class="table table-striped table-hover border border-2 mt-5">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date de naissance</th>
                            <th>Outils</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($patients as $patient) {
                        $id = $patient->id;
                        $firstname = $patient->firstname;
                        $lastname = $patient->lastname;
                        $mail = $patient->mail;
                        $phone = $patient->phone;
                        $birthdate = date('d/m/Y', strtotime($patient->birthdate));
                        ?>
                      
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $firstname ?></td>
                                <td><?= $lastname ?></td>
                                <td><a href="mailto:<?= $mail ?>"><?= $mail ?></a></td>
                                <td><a href="tel:<?= $phone ?>"><?= $phone ?></a></td>
                                <td><?= $birthdate ?></td>
                                <td class="d-flex">
                                    <a class="mt-2" href="controllers/profilPatientCtrl.php?id=<?= $id ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></i></a>
                                    <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Êtes vous sûr de vouloir supprimer ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <a href="/listePatient?idPatient=<?= $id ?>" class="delete" title="Delete" data-toggle="tooltip"> <button type="button" class="btn btn-danger">Supprimer</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
                <?php if(isset($_GET['search'])){ ?>
                    <h2 class="text-center"><?= $emptyMessage ?? '' ?></h2>
                <?php } ?>
            </div>
        </div>
    </div>
</main>