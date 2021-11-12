<main>

<a href="<?= base_url('/addActivityView')  ?>"> Legg til aktivitet</a>


    <table>
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

</main>