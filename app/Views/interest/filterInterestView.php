<div class="container">
    <div class="d-flex justify-content-center align-items-center row">
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Interesse filter</h3>
                    <a class="btn btn-primary" href="<?= base_url('/listMembers') ?>">Tilbake</a>
                </div>

                <form method="post" action="" class="md-5">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Velg interesse:</label>
                            <select name="medlem" id="medl" class="form-select">
                                <option value="" default>Velg</option>
                                <?php
                                foreach ($interests as $row) {
                                ?>
                                    <option onclick="getFilter(<?= $row['id'] ?>)" value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
                <div>
                    <h4>Medlemmer</h4>
                    <h5 id="interest"></h5>
                </div>

                <table class="table table-striped">
                    <thead>

                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>E-post</th>
                        <th>Mobilnummer</th>

                    </thead>

                    <tbody id="async">

                    </tbody>
                </table>

            </div>
        </div>