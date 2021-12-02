<main class="container">

    <div class="mt-2 mb-2 d-flex justify-content-between">
        <a href="<?= base_url('/dashboard'); ?>" class="btn btn-primary">Tilbake til dashbordet</a>
        <a href="<?= base_url('/addActivityView')  ?>" class="btn btn-primary"> Legg til aktivitet</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Aktivitet ID</th>
            <th>Aktivitet</th>
            <th>Startdato</th>
            <th>Sluttdato</th>
            <th>Ansvarlig</th>

        </tr>

        <?php

        foreach ($activities as $row) {

        ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['startdato'] ?></td>
                <td><?= $row['sluttdato'] ?></td>
                <td><?= $row['ansvarlig'] ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
    <?= $pager->links(); ?>
</main>