<main class="w-50">

<?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
<?php endif;?>

    <form action="<?= base_url('SignupController/register') ?>" method="post">
        <h1 class="display-3 mb-3">Registrer deg her</h1>

        <div class="mb-2 form-floating">
            <input type="text" class="form-control" placeholder="User123" name="username" required oninvalid="this.setCustomValidity('Fyll inn brukernavn')" oninput="this.setCustomValidity('')"/>
            <span class="invalide-feedback">  </span>
            <label>Brukernavn</label>
        </div>
        <div class="mb-2 form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('Fyll inn et passord')" oninput="this.setCustomValidity('')">
            <span class="invalide-feedback">  </span>
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
        <button class="btn btn-lg btn-secondary" type="reset">Reset</button>
    </form>
    <p>Har du bruker?</p>
    <a href="<?= base_url('UserController/index') ?>">Logg på her</a>
</main>