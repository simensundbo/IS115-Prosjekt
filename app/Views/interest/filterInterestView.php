<div class="container">
    <div class="d-flex flex-column">
        <div>
            <a class="btn btn-primary btn-rounded mt-2" href="<?= base_url('/listMembers') ?>"><i class="fas fa-long-arrow-alt-left"></i></a>
        </div>

        <h2>Interesser</h2>

        <h3>Velg interesse her</h3>


        <form method="post" action="" class="md-5">
            <select name="medlem" id="medl" class="form-select">
                <option value=""> Velg interesse</option>
                <?php
                foreach ($interests as $row) {
                ?>
                    <option onclick="getFilter(<?= $row['id'] ?>)" value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </form>

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