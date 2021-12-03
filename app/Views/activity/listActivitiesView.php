<div class="container">
    <div class="mt-2 mb-2 d-flex justify-content-between">
        <div class="">
            <a href="<?= base_url('/dashboard'); ?>" class="btn btn-primary">Tilbake til dashbordet</a>
            <a href="<?= base_url('/comingActivities');  ?>" class="btn btn-primary">Se alle kommende aktiviteter</a>
        </div>
        <a href="<?= base_url('/addActivityView')  ?>" class="btn btn-primary"> Legg til aktivitet</a>
    </div>
    <div>
        <h4>Alle aktiviteter</h4>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Info</th>
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
                <td><a class="btn btn-primary" href="">Info</a></td>
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
</div>