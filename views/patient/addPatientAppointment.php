<main>
    <div class="container-fluid">
        <div class="row">
            <form class="bgGreen mx-5 my-5 w-75 mx-auto rounded-3 formPatient" action="" method="post">
                <h2 class="text-center pt-3"><i class="fa-solid fa-hospital-user"></i> Ajout patient</h2>
                <hr class="w-75 mx-auto">
                <div class="mx-auto w-50">
                    <label class="form-label" for="firstname">Prénom*</label>
                    <input class="form-control " type="text" name="firstname" id="firstname" required pattern='<?= REGEXP_TEXT ?>' placeholder="ex : Jean" value="<?= $firstname ?? '' ?>">
                    <p class="text-danger mb-4"><?= $error['firstname'] ?? '' ?></p>
                    <label class="form-label" for="lastname">Nom*</label>
                    <input class="form-control " type="text" name="lastname" id="lastname" required pattern='<?= REGEXP_TEXT ?>' placeholder="ex : Dupont" value="<?= $lastname ?? '' ?>">
                    <p class="text-danger mb-4"><?= $error['lastname'] ?? '' ?></p>
                    <label class="form-label" for="email">Adresse mail*</label>
                    <input class="form-control " type="email" name="email" id="email" required placeholder="ex : jeandupont@gmail.com" value="<?= $email ?? '' ?>">
                    <p class="text-danger mb-4"><?= $error['email'] ?? '' ?></p>
                    <label class="form-label" for="birthdate">Date de naissance*</label>
                    <input class="form-control " type="date" name="birthdate" id="birthdate" required min="1850-01-01" max="<?= date('Y-m-d') ?>" value="<?= $birthdate ?? '' ?>">
                    <p class="text-danger mb-4"><?= $error['birthdate'] ?? '' ?></p>
                    <label class="form-label" for="phone">Téléphone</label>
                    <input class="form-control " type="tel" name="phone" id="phone" pattern='<?= REGEXP_TEL ?>' placeholder="ex : 0712253014" value="<?= $phone ?? '' ?>">
                    <p class="text-danger mb-4"><?= $error['phone'] ?? '' ?></p>
                    <div class="form-floating mt-5 mb-4">
                        <select class="form-select" name="patients" id="patients">
                            <?php foreach ($patients as $key => $patient) { ?>
                                <option value="<?= $patient->id ?>"><?= $patient->lastname . ' ' . $patient->firstname . ' - ' . $patient->mail ?> </option>
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
</main>