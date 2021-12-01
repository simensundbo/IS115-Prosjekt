<main class="d-flex justify-content-center align-items-center flex-column">

    <?php if (isset($validation)) : ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <h1 class="display-3 mb-3">Registrer deg</h1>

    <form class="w-50" action="<?= base_url('UserController/registrer') ?>" method="post">
        <div class="mb-2 form-floating">
            <input type="text" class="form-control" placeholder="User123" name="username" required oninvalid="this.setCustomValidity('Fyll inn brukernavn')" oninput="this.setCustomValidity('')" />
            <span class="invalide-feedback"> </span>
            <label>Brukernavn</label>
        </div>
        <div class="mb-2 form-floating">
            <input type="text" class="form-control" placeholder="1234567" name="EmployeeNumber" required oninvalid="this.setCustomValidity('Fyll inn ditt ansatt nummer')" oninput="this.setCustomValidity('')" />
            <span class="invalide-feedback"> </span>
            <label>Ansatt nummer</label>
        </div>
        <div class="mb-2 form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('Fyll inn et passord')" oninput="this.setCustomValidity('')">
            <span class="invalide-feedback"> </span>
            <label>Passord</label>
        </div>
        <div class="mb-2 form-floating">
            <input type="password" class="form-control" placeholder="Password" name="confirmpassword" required oninvalid="this.setCustomValidity('Fyll inn et passord')" oninput="this.setCustomValidity('')">
            <label>Bekreft passord</label>
        </div>
        <div>
            <?php

            ?>
        </div>
        <button class="btn btn-lg btn-primary" type="submit" name="submit">Registrer</button>
        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
    </form>
    <div class="d-flex align-items-center flex-column">
        <p>Har du bruker?</p>
        <a class="btn btn-primary" href="<?= base_url('/login') ?>">Logg på her</a>
    </div>

</main>