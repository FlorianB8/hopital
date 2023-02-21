<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-5 mt-5 bgGreen rounded-3 p-5 text-center">
                <div class='w-75 mx-auto alert alert-<?= $type ?? ''?>'>
                   <?=$flash ?? '' ?>
                </div>
                <h2 class="text-center">Profil Patient</h2>
                <hr>
                <form method="post">
                    <div>
                        <label for="inputLastname"><strong> Nom : </strong></label>
                        <input name="lastname" id="inputLastname" class="profilInput text-center mb-3" type="text" value="<?=$patient->getLastname()?>" readonly>
                    </div>
                    <div>
                        <label for="inputFirstname"><strong> Prénom : </strong></label>
                        <input name="firstname" id="inputFirstname" class="profilInput text-center mb-3" type="text" value="<?=$patient->getFirstname()?>" readonly>
                    </div>
                    <div>
                        <label for="inputMail"><strong> Adresse mail : </strong></label>
                        <input name="email" id="inputMail" class="profilInput text-center mb-3" type="email" value="<?=$patient->getEmail()?>" readonly>
                    </div>
                    <div>
                        <label for="inputBirthdate"> <strong> Date de naissance : </strong></label>
                        <input name="birthdate" id="inputBirthdate" class="profilInput text-center mb-3" type="date" value="<?=$patient->getBirthdate()?>" readonly>
                    </div>
                    <div>
                        <label for="inputPhone"><strong> Numéro de téléphone : </strong> </label>
                        <input name="phone" id="inputPhone" class="profilInput text-center mb-3" type="tel" value="<?=$patient->getPhone()?>" readonly>
                    </div>
                    <input id="btnValidate" class="btn btn-dark" type="submit" value="Valider" hidden>
                </form>
                <button id="btnModify" class="btn btn-dark">Modifier</button>
            </div>
        </div>
    </div>
</main>