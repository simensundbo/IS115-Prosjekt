<main class="container">

    <h1>Velkommen til NEO ungdomsklubb</h1>
    <div class="d-flex justify-content-between">
        <p class=""> <?= 'Velkommen ' . ucfirst(session()->get('user')) ?> </p>
        <div class="">
            <p><?= date('l M Y') ?></p>
            <p>Temperatur: <i class="fas fa-thermometer-half"></i> <?= $temp ?>℃</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="">
            <a href="<?php  ?>" class="m-1 btn btn-primary btn-rounded"> Din profil</a>
        </div>
        <div class="">
            <a href="<?= base_url('/listMembers')  ?>" class="m-1 btn btn-primary btn-rounded">Medlemmer</a>
        </div>
        <!-- <div class="">
            <a href="<?= base_url('/comingActivities')  ?>" class="m-1 btn btn-primary">Kommende aktiviteter</a>
        </div> -->
        <div class="">
            <a href="<?= base_url('/comingActivities') ?>" class="m-1 btn btn-primary btn-rounded"> Aktiviteter</a>
        </div>
        <div class="">
            <a href="<?= base_url('/mailDashboard') ?>" class="m-1 btn btn-primary btn-rounded">Mail</a>
        </div>
        <div>
            <a href="<?= base_url('/logout') ?>" class="m-1 btn btn-danger btn-rounded">Logg ut</a>
        </div>
    </div>

</main>