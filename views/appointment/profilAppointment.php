<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class='w-75 mx-auto mt-5 alert alert-<?= $type ?? ''?>'>
               <?= $flash ?? '' ?>
            </div>
            <div class="col-5 bgGreen rounded-3 p-5 text-center">
                <h2 class="text-center"><i class="fa-solid fa-calendar-check"></i> Profil rendez-vous</h2>
                <hr>
                <form method="post">
                    <div>
                        <label for="inputIdPatient"><strong> ID Patient : </strong> </label>
                        <input name="idPatients" id="inputIdPatient" class="profilInput text-center mb-3" type="tel" value="<?=$appointment->id?>" readonly>
                    </div>
                    <div>
                        <label for="inputDateHour"><strong> Date & Heure : </strong></label>
                        <input name="dateHour" id="inputDateHour" class="profilInput text-center mb-3" type="datetime-local" value="<?=$appointment->dateHour?>" readonly>
                        <p class="text-danger mb-4"><?= $error['datehour'] ?? '' ?></p>
                    </div>
                    <input id="btnValidateAppointment" class="btn btn-dark" type="submit" value="Valider" hidden>
                </form>
                <button id="btnModifyAppointment" class="btn btn-dark">Modifier</button>
            </div>
        </div>
    </div>
</main>