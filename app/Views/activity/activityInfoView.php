<div class="">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Aktivitets informasjon</h4>
                        <a class="btn btn-primary btn-rounded" href="<?= base_url('/comingActivities') ?>"><i class="fas fa-long-arrow-alt-left"></i></a>
                    </div>
                    <form action="" method="">
                        <fieldset disabled>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Aktivitet</label><input type="text" name="activity" class="form-control" value="<?= $activity['0']['name'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Sted</label><input type="text" name="location" class="form-control" value="<?= $activity['0']['location'] ?>" required></div>
                                <div class="col-md-12"><label class="labels">Startdato</label><input type="date" name="stdate" class="form-control" value="<?= $activity['0']['start_date'] ?>" required></div>
                                <div class="col-md-12"><label class="labels">Sluttdato</label><input type="date" name="enddate" class="form-control" value="<?= $activity['0']['end_date'] ?>" required></div>
                                <div class="col-md-12"><label class="labels">Ansvarlig</label><input type="text" name="responsible" class="form-control" value="<?= $activity['0']['resFname'] . " " . $activity['0']['resLname'] ?>" required></div>
                                <div class="col-md-12"><label class="labels">Nestleder</label><input type="text" name="deputy_responsible" class="form-control" value="<?= $activity['0']['depFname'] . " " . $activity['0']['depLname'] ?>" required></div>
                                <div class="col-md-12"><label class="labels">Økonomiansvarlig</label><input type="text" name="finance_responsible" class="form-control" value="<?= $activity['0']['finFname'] . " " . $activity['0']['finLname'] ?>" required></div>
                            </div>
                        </fieldset>
                    </form>
                    <div class="d-flex justify-content-center">
                        <a href="<?= base_url('/activityUpdateView/' . $activity['0']['id']) ?>" class="btn btn-primary btn-rounded mx-2" type="button">Oppdater</a>
                        <a href="<?= base_url('/deleteActivity/' . $activity['0']['id']) ?>" class="btn btn-danger btn-rounded" type="button" onclick="return confirm('Er du sikker på at du vil slette denne aktiviteten?')">Slett</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Påmeldte<h4>
                        <a href="<?= base_url('/registerMemberView/' . $activity['0']['id'])?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Registrer</a>
                    </div>
                    <ul class="d-flex list-group list-group text-center mt-3">
                    <?php foreach($registered as $person){  ?>
                        <li class="list-group-item"><?= $person['fname'] . " " . $person['lname'] ?></li>
                        <?php }; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>