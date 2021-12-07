<main class="container">

    <div class="d-flex justify-content-between pt-3 pb-2">
        <div>
            <a href="<?= site_url('/dashboard'); ?>" class="btn btn-primary btn-rounded">Tilbake til dahsboard</a>
            <a href="<?= base_url('/addmemberView'); ?>" class="btn btn-primary btn-rounded">Legg til ett medlem i klubben</a>
        </div>
        

        <form action="<?= base_url('/memberProfile'); ?>">
            <div class="input-group">
                <div class="form-outline">
                    <input onkeyup="searchSuggestion()" type="search" id="search" class="form-control" />
                    <label class="form-label" for="form1">Søk</label>
                </div>
                <button type="submit" class="btn btn-primary btn-rounded"><i class="fas fa-search"></i></button>
            </div>
            <ul id="suggestion" class="list-group">
            </ul>
        </form>

    </div>

    <div>
        <h4>Alle medlemmer</h4>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Profile</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>E-post</th>
            <th>Mobilnummer</th>
            <th>Kontingentstatus</th>
            <th>Fødselsdato</th>
            <th>Kjønn</th>
            <th>Medlem siden</th>
        </tr>

        <?php
        foreach ($members as $row) {

        ?>

            <tr>
                <td><a href="<?= base_url('/memberProfile/' . $row['id']); ?>" class="btn btn-primary btn-rounded">Se profil</a></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['lname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile_nr'] ?></td>
                <td><?= $row['contingent_status'] == 1 ? 'Aktiv' : 'Ikke aktiv'  ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['member_since'] ?></td>
            </tr>

        <?php
        }
        ?>

    </table>
    <?= $pager->links() ?>
</main>