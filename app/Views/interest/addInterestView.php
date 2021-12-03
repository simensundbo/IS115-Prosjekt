<div class="d-flex">
    <div>
        <a href=""></a>
    </div>
    <form action="<?= base_url('/addInterest/' . $id) ?>" method="post">
        <select name="interest">
            <?php foreach ($interest as $i) { ?>
                <option value="<?= $i['id'] ?>"><?= $i['name'] ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary">Legg til som interesse</button>
    </form>
</div>