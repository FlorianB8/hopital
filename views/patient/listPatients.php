<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <h2 class="text-center mt-5">Liste des patient(s)</h2>
                <hr class="mx-auto w-75">
                <table class="table table-striped table-hover border border-2 mt-5">
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
                    <?php foreach ($patients as $patient) { 
                        $id = $patient->id;
                        $firstname = $patient->firstname;
                        $lastname = $patient->lastname;
                        $mail = $patient->mail;
                        $phone = $patient->phone;
                        $birthdate = date('d/m/Y', strtotime($patient->birthdate));
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$id?></td>
                                <td><?=$firstname?></td>
                                <td><?=$lastname?></td>
                                <td><?=$mail?></td>
                                <td><?=$phone?></td>
                                <td><?=$birthdate?></td>
                                <td>
                                    <a href="./profilPatientCtrl.php?id=<?=$id?>&mail=<?=$mail?>" class="settings" title="Settings" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</main>