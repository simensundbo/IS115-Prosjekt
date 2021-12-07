<div class="container">
    <div class="mt-2 mb-2 d-flex justify-content-between">
        <div class="">
            <a href="<?= base_url('/dashboard'); ?>" class="btn btn-primary btn-rounded">Tilbake til dashbordet</a>
            <a href="<?= base_url('/comingActivities');  ?>" class="btn btn-primary btn-rounded">Se alle kommende aktiviteter</a>
        </div>
        <a href="<?= base_url('/addActivityView')  ?>" class="btn btn-primary btn-rounded"> Legg til aktivitet</a>
    </div>
    <div>
        <h4>Alle aktiviteter</h4>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Info</th>
            <th>Aktivitet</th>
            <th>Sted</th>
            <th>Startdato</th>
            <th>Sluttdato</th>
            <th>Ansvarlig</th>
            <th>Nestleder</th>
            <th>Økonomiansvarlig</th>

        </tr>

        <?php
        foreach ($activities as $row) {
        ?>
            <tr>
                <td><a class="btn btn-primary btn-rounded" href="<?= base_url('/activityinfo/' . $row['id']) ?>">Info</a></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['location'] ?></td>
                <td><?= $row['start_date'] ?></td>
                <td><?= $row['end_date'] ?></td>
                <td><?= $row['resFname'] . " " . $row['resLname'] ?></td>
                <td><?= $row['depFname'] . " " . $row['depLname'] ?></td>
                <td><?= $row['finFname'] . " " . $row['finLname'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>