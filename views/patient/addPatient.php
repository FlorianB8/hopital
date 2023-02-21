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
                    <h2 class="text-center pt-3"><i class="fa-solid fa-hospital-user"></i> Ajout patient</h2>
                    <hr class="w-75 mx-auto">
                    <div class="mx-auto w-50">
                        <label class="form-label" for="firstname">Prénom*</label>
                        <input class="form-control " type="text" name="firstname" id="firstname" required  pattern='<?= REGEXP_TEXT?>' placeholder="ex : Jean" value="<?=$firstname ?? ''?>">
                        <p class="text-danger mb-4"><?= $error['firstname'] ?? '' ?></p>
                        <label class="form-label" for="lastname" >Nom*</label>
                        <input class="form-control " type="text" name="lastname" id="lastname" required pattern='<?= REGEXP_TEXT?>' placeholder="ex : Dupont" value="<?=$lastname ?? ''?>">
                        <p class="text-danger mb-4"><?= $error['lastname'] ?? '' ?></p>
                        <label class="form-label" for="email">Adresse mail*</label>
                        <input class="form-control " type="email" name="email" id="email" required placeholder="ex : jeandupont@gmail.com" value="<?=$email ?? ''?>">
                        <p class="text-danger mb-4"><?= $error['email'] ?? '' ?></p>
                        <label class="form-label" for="birthdate" >Date de naissance*</label>
                        <input class="form-control " type="date" name="birthdate" id="birthdate" required min="1850-01-01" max="<?= date('Y-m-d') ?>" value="<?=$birthdate ?? ''?>">
                        <p class="text-danger mb-4"><?= $error['birthdate'] ?? '' ?></p>
                        <label class="form-label" for="phone">Téléphone</label>
                        <input class="form-control " type="tel" name="phone" id="phone" pattern='<?= REGEXP_TEL?>' placeholder="ex : 0712253014" value="<?=$phone ?? ''?>"> 
                        <p class="text-danger mb-4"><?= $error['phone'] ?? '' ?></p>
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