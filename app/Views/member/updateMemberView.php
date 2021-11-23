<main>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" height="150px" src="/assets/img/technology.png">
                    <button class="m-2 btn btn-primary profile-button font-weight-bold">Last opp ett bilde</button>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Oppdater medlems profil</h4>
                        <a class="btn btn-primary profile-button" href="<?= base_url('/memberProfile/' . $member['id']) ?>">Tilbake</a>
                    </div>
                    <form action="<?= base_url("/updateMember/" . $member['id']) ?>" method="post">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Navn</label><input name="fname" type="text" class="form-control" placeholder="fornavn" value="<?= $member['fname'] ?>"></div>
                            <div class="col-md-6"><label class="labels">Etternavn</label><input name="lname" type="text" class="form-control" placeholder="etternavn" value="<?= $member['lname'] ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobil Nummer</label><input name="mobile_nr" type="text" class="form-control" placeholder="mobilnummer" value="<?= $member['mobile_nr'] ?>"></div>
                            <div class="col-md-12"><label class="labels">Adresse</label><input name="address" type="text" class="form-control" placeholder="Adresse" value="<?= $member['street_name'] ?>"></div>
                            <div class="col-md-12"><label class="labels">Post sted</label><input name="post_area" type="text" class="form-control" placeholder="poststed" value="<?= $member['post_area'] ?>"></div>
                            <div class="col-md-12"><label class="labels">Post nummer</label><input name="post_code" type="text" class="form-control" placeholder="Post nummer" value="<?= $member['post_code'] ?>"></div>
                            <div class="col-md-12"><label class="labels">Fødselsdato</label><input name="dob" type="date" class="form-control" placeholder="Fødselsdato" value="<?= $member['dob'] ?>"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input name="epost" type="text" class="form-control" placeholder="Email" value="<?= $member['email'] ?>"></div>
                            <div class="col-md-12">
                                <label class="labels">Kjønn</label>
                                <select name="gender" class="form-select">
                                    <optgroup label="Nå værende">
                                        <option value="<?= $member['gender'] ?>"><?= $member['gender'] ?></option>
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
                            <button class="btn btn-primary profile-button" type="submit">Oppdater profilen</button>
                            <p class="m-5"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>