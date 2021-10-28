<main>
    <h1>Velkommen til admin siden</h1>
    <p><?php
        session_start();
        echo $_SESSION['user'] ?></p>

    <a href="<?php  ?>"> Din profil</a>
    <a href="<?= base_url('/addmember') ?>"> Legg til ett medlem i klubben</a>
    <a href="<?php  ?>"> Se alle medlemmer</a>
</main>