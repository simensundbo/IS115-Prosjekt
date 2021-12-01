<div class="d-flex justify-content-center align-items-center flex-column ">
    <?php if (isset($validation)) : ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <h1 class="display-3 mb-3">Logg på</h1>

    <form class="w-50" action="<?= base_url('/UserController/login') ?>" method="post">
        <div class="mb-2 form-floating">
            <input type="text" class="form-control" placeholder="User123" name="username" required oninvalid="this.setCustomValidity('Fyll inn brukernavn')" oninput="this.setCustomValidity('')" />
            <span class="invalide-feedback"> <?php echo isset($user_err) ? $user_err : null; ?> </span>
            <label>Brukernavn</label>
        </div>
        <div class="mb-2 form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('Fyll inn et passord')" oninput="this.setCustomValidity('')">
            <span class="invalide-feedback"> <?php echo isset($pass_err) ? $pass_err : null; ?> </span>
            <label>Passord</label>
        </div>
        <button class="btn btn-lg btn-primary" type="submit" name="submit">Logg på</button>
        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
    </form>
    <div class="d-flex align-items-center flex-column">
        <p>Har du ikke bruker?</p>
        <div class="">
            <a class="btn btn-primary" href="<?= base_url('/register') ?>">Registrering for ansatte</a>
            <a class="btn btn-primary" href="<?php ?>">Registrering for medlemmer</a>
        </div>
    </div>
</div>