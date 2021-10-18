<main>
    <h1>Velkommen til admin siden</h1>
    <p><?php
        session_start();
        echo $_SESSION['user'] ?></p>
</main>