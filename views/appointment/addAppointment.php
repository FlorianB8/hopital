<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-5">
                <?php if (isset($_SESSION['flash'])) { ?>
                    <div class='w-75 mx-auto alert alert-<?= $flash->getType()?>'>
                       <?=$flash->getMessage()?>
                    </div>
                <?php } ?>
                <form class="bgGreen mx-5 my-5 w-75 mx-auto rounded-3 formPatient" action="" method="post">
                    <h2 class="text-center pt-3"><i class="fa-solid fa-calendar-check"></i> Ajout rendez-vous</h2>
                    <hr class="w-75 mx-auto">
                    <div class="mx-auto w-50">
                        <div class="form-floating mt-5 mb-4">
                            <select class="form-select" name="patients" id="patients">
                                <?php foreach ($patients as $key => $patient) { ?>
                                    <option value="<?=$patient->id?>"><?=$patient->lastname.' '.$patient->firstname.' - '. $patient->mail ?> </option>
                                <?php } ?>
                            </select>
                            <label for="patients">Sélection patient</label>
                        </div>
                        <p class="text-danger mb-4"><?= $error['select'] ?? '' ?></p>
                        <label class="form-label" for="datehour">Date et heure*</label>
                        <input class="form-control mb-3" type="datetime-local" name="datehour" id="datehour" required>
                        <p class="text-danger mb-4"><?= $error['datehour'] ?? '' ?></p>
                        <p>* Champs obligatoires</p>
                        <div class="d-flex justify-content-center">
                            <input class="btn btn-dark mb-5" type="submit" name="btnSubmit" id="btnSubmit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>