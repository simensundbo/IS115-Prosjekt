<main class="container">

    <h1>Velkommen til admin siden</h1>
    <div class="">
        <?php
        
        
        ?>
        <p class=""> <?=  'Velkommen ' . ucfirst(session()->get('user')) ?> </p>
    </div>

    <div class="">
        <div class="">
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
                <a href="<?= base_url('')  ?>" class="m-1 btn btn-primary">Aktiviteter</a>
            </div>
            <div class="">
                <a href="<?= base_url('/listActivities') ?>" class="m-1 btn btn-primary"> Se alle aktiviteter</a>
            </div>
            <div>
                <button class="m-1 btn btn-primary" onclick="test()">Test</button>
            </div>
        </div>
    </div>

    <div id="users">

    </div>

</main>