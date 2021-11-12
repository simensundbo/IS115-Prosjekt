<main>


    <table>
        <tr>
            <th>Medlem ID</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Gatenavn</th>
            <th>Postnummer</th>
            <th>Poststed</th>
            <th>E-post</th>
            <th>Mobilnummer</th>
            <th>Aktiviter</th>
            <th>Interesser</th>
            <th>Kontingentstatus</th>
            <th>Fødselsdato</th>
            <th>Kjønn</th>
            <th>Oppdater</th>
            <th>Slett</th>
        </tr>

        <?php

        foreach ($members as $row) {

        ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['lname'] ?></td>
                <td><?= $row['street_name'] ?></td>
                <td><?= $row['post_code'] ?></td>
                <td><?= $row['post_area'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile_nr'] ?></td>
                <td><?= $row['aktivity_id'] ?></td>
                <td><?= $row['interest_id'] ?></td>
                <td><?= $row['contingent_status'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><a href="<?php echo site_url('/update/'.$row['id']); ?>">Oppdater</a></td>
                <td><a href="<?php echo site_url('/delete/'.$row['id']); ?>">Slett</a></td>
            </tr>

        <?php
        }
        ?>
    </table>

</main>

