<main class="container">
    <a href="<?=site_url('/dashboard'); ?>" class="mb-2 mt-2 btn btn-primary">Tilbake til dahsboard</a>
    <table class="table table-striped">
        <tr>
            <th>Profile</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>E-post</th>
            <th>Mobilnummer</th>
            <th>Kontingentstatus</th>
            <th>Fødselsdato</th>
            <th>Kjønn</th>
        </tr>

        <?php

        foreach ($members as $row) {

        ?>

            <tr>
                <td><a href="<?= base_url('/memberProfile/'.$row['id']); ?>" class="btn btn-primary">Se profil</a></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['lname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile_nr'] ?></td>
                <td><?= $row['contingent_status'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['gender'] ?></td>
            </tr>

        <?php
        }
        ?>
    </table>

</main>

