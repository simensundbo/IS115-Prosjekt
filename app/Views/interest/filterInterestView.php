<div>

    <h2>Interesser</h2>

    <h3>Velg interesse her</h3>


    <form method="post" action="<?= base_url('/filterInterest') ?>">
        <select name="medlem" id="medl" class="form-select">
            <option value=""> Velg interesse</option>
            <?php
            foreach ($interests as $row) {
            ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="registrer" value="Søk">
    </form>


    <div>
        <h4>Medlemmer</h4>
        <h5><?= isset($medlem_int['0']['name']) ? $medlem_int['0']['name'] : '' ?></h5>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>E-post</th>
            <th>Mobilnummer</th>
        </tr>

        <?php
        if (isset($medlem_int)) {

            foreach ($medlem_int as $row) {
        ?>

                <tr>
                    <td><?= $row['fname'] ?></td>
                    <td><?= $row['lname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['mobile_nr'] ?></td>
                </tr>

        <?php
            }
        }
        ?>
    </table>

</div>