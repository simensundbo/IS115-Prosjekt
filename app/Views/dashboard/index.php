<main class="container">

    <h1>Velkommen til admin siden</h1>
    <div class="position-relative">
        <?php
        
        session_start();
        ?>
        <p class=""> <?=  'Velkommen ' . ucfirst($_SESSION['user']) ?> </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="">
                <a href="<?php  ?>" class="m-1 btn btn-primary"> Din profil</a>
            </div>
            <div class="">
                <a href="<?= base_url('/addmemberView') ?>" class="m-1 btn btn-primary"> Legg til ett medlem i klubben</a>
            </div>
            <div class="">
                <a href="<?= base_url('/listMembers')  ?>" class="m-1 btn btn-primary"> Se alle medlemmer</a>
            </div>
            <div class="">
                <a href="<?= base_url('/')  ?>" class="m-1 btn btn-primary">Søk etter medlemmer</a>
            </div>
            <div class="">
                <a href="<?= base_url('/listActivities') ?>" class="m-1 btn btn-primary"> Se alle aktiviteter</a>
            </div>

            <!-- <button class="btn btn-primary" onclick="TimeInterval()">Test</button> -->
        </div>
    </div>

    <div id="users">

    </div>

</main>