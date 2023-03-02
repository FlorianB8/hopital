<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class='w-75 mx-auto mt-2 alert alert-<?= $type ?? ''?>'>
               <?=$flash ?? '' ?>
            </div>
            <div class="col-5 bgGreen rounded-3 text-center">
                <h2 class="text-center mt-2">Profil Patient</h2>
                <hr>
                <form method="post">
                    <div>
                        <label for="inputLastname"><strong> Nom : </strong></label>
                        <input name="lastname" id="inputLastname" class="profilInput text-center mb-3" type="text" value="<?=$patient->lastname?>" readonly>
                    </div>
                    <div>
                        <label for="inputFirstname"><strong> Prénom : </strong></label>
                        <input name="firstname" id="inputFirstname" class="profilInput text-center mb-3" type="text" value="<?=$patient->firstname?>" readonly>
                    </div>
                    <div>
                        <label for="inputMail"><strong> Adresse mail : </strong></label>
                        <input name="email" id="inputMail" class="profilInput text-center mb-3" type="email" value="<?=$patient->mail?>" readonly>
                    </div>
                    <div>
                        <label for="inputBirthdate"> <strong> Date de naissance : </strong></label>
                        <input name="birthdate" id="inputBirthdate" class="profilInput text-center mb-3" type="date" value="<?=$patient->birthdate?>" readonly>
                    </div>
                    <div>
                        <label for="inputPhone"><strong> Numéro de téléphone : </strong> </label>
                        <input name="phone" id="inputPhone" class="profilInput text-center mb-3" type="tel" value="<?=$patient->phone?>" readonly>
                    </div>
                    <input id="btnValidate" class="btn btn-dark mb-3" type="submit" value="Valider" hidden>
                </form>
                <button id="btnModify" class="btn btn-dark mb-3">Modifier</button>
                <?php if(!empty($appointments)) { ?>
                <h2 class="mt-3">Rendez vous du patient :</h2>
                <hr>
                <ul>
            
                <?php foreach ($appointments as $appointment) { ?>
                    <li>Le <?= date('d/m/Y à H:i', strtotime($appointment->dateHour)) ?></li>
                    <hr class="w-25 mx-auto">
                <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</main>