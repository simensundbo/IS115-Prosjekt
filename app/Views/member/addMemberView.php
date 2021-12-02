<div class="d-flex justify-content-center align-items-center rounded-2 bg-white flex-column">
    <?php if (isset($validation)) { ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php }; ?>

    <div class="d-flex justify-content-center align-items-center row">
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Opprett medlem</h4>
                    <a class="btn btn-primary" href="<?= base_url('/listMembers') ?>"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
                <form action="<?= base_url("/addmember") ?>" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Navn</label><input name="fname" type="text" class="form-control" placeholder="fornavn" value="<?= isset($_POST['fname']) ? $_POST['fname'] : null  ?>"></div>
                        <div class="col-md-6"><label class="labels">Etternavn</label><input name="lname" type="text" class="form-control" placeholder="etternavn" value="<?= isset($_POST['lname']) ? $_POST['lname'] : null ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobil Nummer</label><input name="mobile_nr" type="text" class="form-control" placeholder="mobilnummer" value="<?= isset($_POST['mobile_nr']) ? $_POST['mobile_nr'] : null ?>"></div>
                        <div class="col-md-12"><label class="labels">Adresse</label><input name="address" type="text" class="form-control" placeholder="Adresse" value="<?= isset($_POST['address']) ? $_POST['address'] : null ?>"></div>
                        <div class="col-md-12"><label class="labels">Post sted</label><input name="post_area" type="text" class="form-control" placeholder="poststed" value="<?= isset($_POST['post_area']) ? $_POST['post_area'] : null ?>"></div>
                        <div class="col-md-12"><label class="labels">Post nummer</label><input name="post_code" type="text" class="form-control" placeholder="Post nummer" value="<?= isset($_POST['post_code']) ? $_POST['post_code'] : null ?>"></div>
                        <div class="col-md-12"><label class="labels">Fødselsdato</label><input name="dob" type="date" class="form-control" placeholder="Fødselsdato" value="<?= isset($_POST['dob']) ? $_POST['dob'] : null ?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input name="epost" type="text" class="form-control" placeholder="Email" value="<?= isset($_POST['epost']) ? $_POST['epost'] : null ?>"></div>
                        <div class="col-md-12">
                            <label class="labels">Kjønn</label>
                            <select name="gender" class="form-select">
                                <optgroup label="Nå værende">
                                    <option value="<?= isset($_POST['gender']) ? $_POST['gender'] : null ?>"><?= isset($_POST['gender']) ? $_POST['gender'] : null ?></option>
                                </optgroup>
                                <optgroup label="Kjønn">
                                    <option value="Mann">Mann</option>
                                    <option value="Dame">Dame</option>
                                    <option value="Øsnker ikke å oppgi">Øsnker ikke å oppgi</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary" type="submit">Opprett medlem</button>
                        <p class="m-5"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>