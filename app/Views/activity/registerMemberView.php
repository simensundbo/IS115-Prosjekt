
<div class="d-flex justify-content-center mt-3">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between">
            <p class="mx-2">Velg medlem</p>
            <a href="<?= base_url('/activityinfo/' . $id) ?>" class="btn btn-primary btn-rounded mx-2"><i class="fas fa-long-arrow-alt-left"></i></a>
        </div>
        <div>
            <?php if(isset($errormsg)){ ?>
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