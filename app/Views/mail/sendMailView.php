<main class="d-flex justify-content-center">
    <div class="w-100">

        <?php if (isset($validation)) { ?>
            <div class="alert alert-warning">
                <?= $validation->listErrors() ?>
            </div>
        <?php }; ?>

        <div class="d-flex justify-content-center align-items-center row">
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Send mail</h4>
                        <a class="btn btn-primary btn-rounded" href="<?= base_url('/mailDashboard') ?>">Tilbake</a>
                    </div>
                    <form action="<?= base_url('/sendMail') ?>" method="post">
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Til:</label>
                                <select name="member" id="medl" class="form-select">
                                    <option value=""> Velg medlem</option>
                                    <?php
                                    foreach ($members as $row) {
                                    ?>
                                        <option value="<?= $row['email'] ?>"><?= $row['fname'] . " " . $row['lname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12"><label class="labels">Emne:</label><input type="text" name="subject" class="form-control" value="<?= isset($_POST["emne"]) ? $_POST["emne"] : null ?> "></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Melding:</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Skriv meldingen her..." rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary btn-rounded" type="submit">Send mail</button>
                            <p class="m-5"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>