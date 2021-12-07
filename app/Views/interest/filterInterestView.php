<div class="container">

    <div class="d-flex justify-content-center align-items-center row">
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Interesse filter</h3>
                    <a class="btn btn-primary" href="<?= base_url('/listMembers') ?>">Tilbake</a>
                </div>
                <form method="post" action="<?= base_url('/filterInterest') ?>">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Velg interesse:</label>
                            <select name="medlem" id="medl" class="form-select">
                                <option value=""></option>
                                <?php
                                foreach ($interests as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary" type="submit">Søk</button>
                        <p class="m-5"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div>
        <div>
            <h4>Medlemmer</h4>
            <h5>Interesse: <?= isset($medlem_int['0']['name']) ? $medlem_int['0']['name'] : '' ?></h5>
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
</div>