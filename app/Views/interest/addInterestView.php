<div class="d-flex justify-content-center mt-3">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between">
            <p class="mx-2">Veg interesser</p>
            <a href="<?= base_url('/memberProfile/' . $id) ?>" class="btn btn-primary mx-2"><i class="fas fa-long-arrow-alt-left"></i></a>
        </div>
        <div>
            <?php if(isset($errormsg)){ ?>
                <p class="alert alert-danger"><?= $errormsg ?></p>
           <?php } ?>
        </div>
        <form action="<?= base_url('/addInterest/' . $id) ?>" method="post">
            <select name="interest" class="form-select my-3">
                <option value="test">Velg</option>
                <?php foreach ($interest as $i) { ?>
                    <option value="<?= $i['id'] ?>"><?= $i['name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Legg til som interesse</button>
        </form>
    </div>
</div>