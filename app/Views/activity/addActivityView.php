<main class="d-flex justify-content-center">
    <a href="<?= base_url('/listActivities'); ?>">Tilbake</a>
    <?php if (isset($validation)) { ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php }; ?>
    <form action="<?= base_url("/addActivity") ?>" method="post">
        <table>
            <h3>Registrer en ny aktivitet</h3>
            <tr>
                <th>Aktivitet*:</th>
                <td><input type="text" name="activity" value="<?php if (isset($_POST["activity"])) {
                                                                    echo $_POST["activity"];
                                                                } ?> " required></td>
            </tr>
            <tr>
                <th>Startdato*:</th>
                <td><input type="date" name="stdate" value="<?php if (isset($_POST["stdate"])) {
                                                                echo $_POST["stdate"];
                                                            } ?>" required></td>
            </tr>
            <tr>
                <th>Sluttdato*:</th>
                <td><input type="date" name="enddate" value="<?php if (isset($_POST["enddate"])) {
                                                                    echo $_POST["enddate"];
                                                                } ?>" required></td>
            </tr>
            <tr>
                <th>Ansvarlig*:</th>
                <td><select name="ansvarlig" id="ans">
                        <option value=""> Velg</option>
                        <?php
                        foreach ($members as $row) {
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Nestleder*:</th>
                <td><select name="nestleder" id="nest">
                        <option value=""> Velg</option>
                        <?php
                        foreach ($members as $row) {
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Matansvarlig*:</th>
                <td><select name="matansvarlig" id="mat">
                        <option value=""> Velg</option>
                        <?php
                        foreach ($members as $row) {
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Opprett aktivitet">
    </form>
</main>