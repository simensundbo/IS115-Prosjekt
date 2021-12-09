<main class="container">

    <div class="d-flex justify-content-between pt-3 pb-2">
        <div>
            <a href="<?= site_url('//mailDashboard'); ?>" class="btn btn-primary btn-rounded">Tilbake til dashboard</a>
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

    <div class="d-flex justify-content-between">
        <h4>Alle medlemmer med ubetalt kontigent</h4>
        <a href="<?= base_url('/contingentStatusMail') ?>" class="btn btn-primary btn-rounded mb-3">Send en påmindelse om kontigenten</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>E-post</th>
            <th>Mobilnummer</th>
            <th>Kontingentstatus</th>
        </tr>

        <?php
        foreach ($members as $row) {

        ?>

            <tr>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['lname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile_nr'] ?></td>
                <td><?= $row['contingent_status'] == 1 ? 'Aktiv' : 'Ikke aktiv'  ?></td>
            </tr>

        <?php
        }
        ?>

    </table>
    <?= $pager->links() ?>
</main>