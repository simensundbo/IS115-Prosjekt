<div class="d-flex justify-content-center mt-3">
        <div class="d-flex flex-column mx-5">
        <div class="d-flex justify-content-between mb-2">
                <p class="mx-2">Påmeldte</p>
                <a href="<?= base_url('/activityinfo/' . $id) ?>" class="btn btn-primary btn-rounded mx-2">&#8592;</a>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>Avmeld</th>
                </tr>
                <?php foreach($registered as $person){  ?>
                    <tr>
                        <td><?= $person['fname'] ?></td>
                        <td><?= $person['lname'] ?></td>
                        <th><a href=" <?= base_url('/deleteActivityMember/' . $person["member_id"] . '/' . $id )  ?>" class="btn btn-primary btn-rounded" onclick="return confirm('Er du sikker på at du vil slette denne påmeldingen')">&#10005;</a></th>
                    </tr>
                    <?php }; ?>
            </table>
        </div>

        <div class="d-flex flex-column mx-5">
            <div class="d-flex justify-content-between">
                <p class="mx-2">Registrer ett nytt medlem</p>
            </div>
            <div>
                <?php if (isset($errormsg)) { ?>
                    <p class="alert alert-danger"><?= $errormsg ?></p>
                <?php } ?>
            </div>
            <form action="<?= base_url('/registerMember/' . $id) ?>" method="post">
                <select name="member" class="form-select my-3">
                    <option value="test">Velg</option>
                    <?php foreach ($members as $i) { ?>
                        <option value="<?= $i['id'] ?>"><?= $i['fname'] . " " . $i['lname'] ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary btn-rounded">Meld på</button>
            </form>
        </div>
</div>