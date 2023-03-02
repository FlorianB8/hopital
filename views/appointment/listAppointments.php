<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <h2 class="text-center mt-5">Liste des rendez-vous</h2>
                <hr class="mx-auto w-75">
                <table id="table" class="table table-striped table-hover border border-2 mt-5">
                    <thead class="">
                        <tr>
                            <th>ID Patient</th>
                            <th>Date & Heure</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Outils</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($appointments as $appointment) {
                        $idPatient = $appointment->idPatients;
                        $dateHour = date('d/m/Y H:i', strtotime($appointment->dateHour));
                        $firstname = $appointment->firstname;
                        $lastname = $appointment->lastname;
                        $mail = $appointment->mail;
                        $idAppointment = $appointment->id;
                    ?>
                            <tr>
                                <td><?= $idPatient ?></td>
                                <td><?= $dateHour ?></td>
                                <td><?= $firstname ?></td>
                                <td><?= $lastname ?></td>
                                <td><a href="mailto:<?= $mail ?>"><?= $mail ?></a></td>
                                <td class="d-flex">
                                    <a class="mt-2" href="controllers/profilAppointmentCtrl.php?id=<?= $idPatient ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></i></a>
                                    <!-- Button trigger modal -->
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
                                                    <a href="/listeRendezVous?idPatient=<?= $idPatient ?>&idAppointment=<?=$idAppointment?>" class="delete" title="Delete" data-toggle="tooltip"> <button type="button" class="btn btn-danger">Supprimer</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</main>