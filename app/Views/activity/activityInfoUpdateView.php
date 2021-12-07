<div class="">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <?php if (isset($validation)) { ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php }; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Aktivitets informasjon</h4>
                        <a class="btn btn-primary btn-rounded" href="<?= base_url('/activityinfo/' . $activity['0']['id']) ?>"><i class="fas fa-long-arrow-alt-left"></i></a>
                    </div>
                    <form action="<?= base_url('/activityUpdate/' . $activity['0']['id']) ?>" method="post">
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Aktivitet</label><input type="text" name="activity" class="form-control" value="<?= $activity['0']['name'] ?>"></div>
                            <div class="col-md-12"><label class="labels">Sted</label><input type="text" name="location" class="form-control" value="<?= $activity['0']['location'] ?>" ></div>
                            <div class="col-md-12"><label class="labels">Startdato</label><input type="date" name="stdate" class="form-control" value="<?= $activity['0']['start_date'] ?>" ></div>
                            <div class="col-md-12"><label class="labels">Sluttdato</label><input type="date" name="enddate" class="form-control" value="<?= $activity['0']['end_date'] ?>" ></div>
                            <div class="col-md-12"><label class="labels">Ansvarlig</label>
                                <select name="responsible" id="responsible" class="form-select">
                                    <option value="<?= $activity['0']['responsible'] ?>" selected hidden> <?= $activity['0']['resFname'] . " " . $activity['0']['resLname'] ?></option>
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
                                <select name="deputy_responsible" id="nest" class="form-select">
                                    <option value="<?= $activity['0']['deputy_responsible'] ?>" selected hidden> <?= $activity['0']['depFname'] . " " . $activity['0']['depLname'] ?></option>
                                    <?php
                                    foreach ($members as $row) {
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12"><label class="labels">Økonomiansvarlig</label>
                                <select name="finance_responsible" id="mat" class="form-select">
                                    <option value="<?= $activity['0']['finance_responsible'] ?>" selected hidden> <?= $activity['0']['finFname'] . " " . $activity['0']['finLname'] ?></option>
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
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary btn-rounded mt-3" type="submit">Oppdater</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>