<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-5">
                <form class="" action="" method="post">
                    <label class="form-label" for="firstname">Prénom</label>
                    <input class="form-control " type="text" name="firstname" id="firstname">
                    <p class="text-danger mb-4"><?=$error['firstname'] ?? '' ?></p>
                    <label class="form-label" for="lastname">Nom</label>
                    <input class="form-control " type="text" name="lastname" id="lastname">
                    <p class="text-danger mb-4"><?=$error['lastname'] ?? '' ?></p>
                    <label class="form-label" for="email">Adresse mail</label>
                    <input class="form-control " type="email" name="email" id="email">
                    <p class="text-danger mb-4"><?=$error['email'] ?? '' ?></p>
                    <label class="form-label" for="birthdate">Date de naissance</label>
                    <input class="form-control " type="date" name="birthdate" id="birthdate">
                    <p class="text-danger mb-4"><?=$error['birthdate'] ?? '' ?></p>
                    <label class="form-label" for="phonenumber">Téléphone</label>
                    <input class="form-control " type="tel" name="phonenumber" id="phonenumber">
                    <p class="text-danger mb-4"><?=$error['phonenumber'] ?? '' ?></p>
                    <input class="btn btn-dark" type="submit" name="btnSubmit" id="btnSubmit">
                </form>
            </div>
        </div>
    </div>

</main>