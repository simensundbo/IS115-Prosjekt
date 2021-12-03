<main class="container">

    <div class="mt-2 mb-2 d-flex justify-content-between">
        <a href="<?= base_url('/dashboard'); ?>" class="btn btn-primary">Tilbake til dashbordet</a>
        <a href="<?= base_url('/addActivityView')  ?>" class="btn btn-primary"> Legg til aktivitet</a>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h4>Kommende aktiviteter</h4>

    <p><i class="fas fa-calendar-alt"></i> Dagens dato: <?=DATE("Y-m-d")?></p>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Aktivitet</th>
            <th>Startdato</th>
            <th>Sluttdato</th>
            <th>Ansvarlig</th>
            <th>Nestleder</th>
            <th>Matansvarlig</th>
        </tr>

        <?php

        foreach ($activities as $row) {

        ?>

            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['startdato'] ?></td>
                <td><?= $row['sluttdato'] ?></td>
                <td><?= $row['AnsFname'] . " " . $row['AnsLname'] ?></td>
                <td><?= $row['NestFname'] . " " . $row['NestLname'] ?></td>
                <td><?= $row['MatAnsFname'] . " " . $row['MatAnsLname'] ?></td>
            </tr>

        <?php
        }
        ?>
    </table>

</main>