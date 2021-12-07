<main class="d-flex justify-content-center">
    <?php if (isset($validation)) { ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php }; ?>

    <div class="d-flex justify-content-center align-items-center row">
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Send mail til medlem</h4>
                    <a class="btn btn-primary" href="<?= base_url('/listActivities') ?>">Tilbake</a>
                </div>
                <form action="<?= base_url("/addActivity") ?>" method="post">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Aktivitet</label><input type="text" name="activity" class="form-control" value="<?php if (isset($_POST["activity"])) {
                                                                                                                                                            echo $_POST["activity"];
                                                                                                                                                        } ?> " required></div>
                        <div class="col-md-12"><label class="labels">Startdato</label><input type="date" name="stdate" class="form-control" value="<?php if (isset($_POST["stdate"])) {
                                                                                                                                                        echo $_POST["stdate"];
                                                                                                                                                    } ?>" required></div>
                        <div class="col-md-12"><label class="labels">Sluttdato</label><input type="date" name="enddate" class="form-control" value="<?php if (isset($_POST["enddate"])) {
                                                                                                                                                        echo $_POST["enddate"];
                                                                                                                                                    } ?>" required></div>
                        <div class="col-md-12"><label class="labels">Ansvarlig</label>
                            <select name="ansvarlig" id="ans" class="form-select">
                                <option value=""> Velg</option>
                                <?php
                                foreach ($members as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12"><label class="labels">Nestleder</label>
                            <select name="nestleder" id="nest" class="form-select">
                                <option value=""> Velg</option>
                                <?php
                                foreach ($members as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12"><label class="labels">Matansvarlig</label>
                            <select name="matansvarlig" id="mat" class="form-select">
                                <option value=""> Velg</option>
                                <?php
                                foreach ($members as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="mt-5 text-center">
                <button class="btn btn-primary" type="submit">Opprett aktivitet</button>
                <p class="m-5"></p>
            </div>
            </form>
        </div>
    </div>
</main>