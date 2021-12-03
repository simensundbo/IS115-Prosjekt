<main class="container">

    <h1>Velkommen til NEO ungdomsklubb</h1>
    <div class="d-flex justify-content-between">
        <p class=""> <?=  'Velkommen ' . ucfirst(session()->get('user')) ?> </p>
        <div class="">
            <p><?= date('l M Y') ?></p>
            <p>Temperatur: <?= $temp ?>℃</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <a href="<?php  ?>" class="m-1 btn btn-primary"> Din profil</a>
            </div>
            <!-- <div class="">
                <a href="<?= base_url('/addmemberView') ?>" class="m-1 btn btn-primary"> Legg til ett medlem i klubben</a>
            </div> -->
            <div class="">
                <a href="<?= base_url('/listMembers')  ?>" class="m-1 btn btn-primary">Medlemmer</a>
            </div>
            <div class="">
                <a href="<?= base_url('/comingActivities')  ?>" class="m-1 btn btn-primary">Kommende aktiviteter</a>
            </div>
            <div class="">
                <a href="<?= base_url('/listActivities') ?>" class="m-1 btn btn-primary"> Se alle aktiviteter</a>
            </div>
            <div>
                <a href="<?= base_url('/logout') ?>" class="m-1 btn btn-danger">Logg ut</a>
            </div>
    </div>

</main>