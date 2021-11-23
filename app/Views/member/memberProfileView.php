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
                        <h4 class="text-right">Medlems profil</h4>
                        <a class="btn btn-primary profile-button" href="<?= base_url('/listMembers')?>">Tilbake</a>
                    </div>
                    <form action="" method="">
                        <fieldset disabled>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Navn</label><input type="text" class="form-control" placeholder="fornavn" value="<?= $member['fname'] ?>"></div>
                                <div class="col-md-6"><label class="labels">Etternavn</label><input type="text" class="form-control" placeholder="etternavn" value="<?= $member['lname'] ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Mobil Nummer</label><input name="mobile_nr" type="text" class="form-control" placeholder="mobilnummer" value="<?= $member['mobile_nr'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Adresse</label><input name="street_name" type="text" class="form-control" placeholder="Adresse" value="<?= $member['street_name'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Post sted</label><input name="post_erea" type="text" class="form-control" placeholder="poststed" value="<?= $member['post_area'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Post nummer</label><input name="post_code" type="text" class="form-control" placeholder="Post nummer" value="<?= $member['post_code'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Fødselsdato</label><input name="dob" type="date" class="form-control" placeholder="Fødselsdato" value="<?= $member['dob'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="Email" value="<?= $member['email'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Kjønn</label><input name="gender" name="email" type="text" class="form-control" placeholder="Email" value="<?= $member['gender'] ?>"></div>
                            </div>
                        </fieldset>
                    </form>
                    <div class="mt-5 text-center">
                        <a href="<?= base_url('/updateView/' . $member['id']); ?>" class="btn btn-primary profile-button" type="button">Oppdater profilen</a>
                        <a href="<?= base_url('/deleteMember/' . $member['id']); ?>" class="btn btn-primary profile-button" type="button" onclick="return confirm('Er du sikker på at du vil slette dette medlemmet?')" >Slett profilen</a>
                        <p class="m-5"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Interesser</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </div>
</main>