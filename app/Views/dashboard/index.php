<main class="position-relative">

    <h1>Velkommen til admin siden</h1>
    <div class="">
        <p class="position-absolute top-50 start-50 translate-middle">
            <?php
            session_start();
            echo 'Velkommen ' .  ucfirst($_SESSION['user'])  ?>
        </p>
    </div>

    <div class="position-relative">
        <a href="<?php  ?>" class="btn btn-primary"> Din profil</a>
        <a href="<?= base_url('/addmemberView') ?>" class="btn btn-primary"> Legg til ett medlem i klubben</a>
        <a href="<?= base_url('/listMembers')  ?>" class="btn btn-primary"> Se alle medlemmer</a>
        <a href="<?= base_url('/')  ?>" class="btn btn-primary">Søk etter medlemmer</a>
        <a href="<?= base_url('/listActivities') ?>" class="btn btn-primary"> Se alle aktiviteter</a>
    </div>
    <button onclick="test()">Test</button>

    <div id="users">
        
    </div>

</main>