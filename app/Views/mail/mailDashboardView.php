<main class="container">

    <div class="d-flex justify-content-between pt-3 pb-2">
        <div>
            <a href="<?= site_url('/dashboard'); ?>" class="btn btn-primary btn-rounded">Tilbake til dashboard</a>
        </div>
    </div>

    <div class="d-flex align-items-center">
        <h4>Mail</h4>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="">
            <a href="<?= base_url('/sendMailView')?>" class="m-1 btn btn-primary btn-rounded"> Send mail</a>
        </div>
        <div class="">
            <a href="<?= base_url('/sendNewsMailView')  ?>" class="m-1 btn btn-primary btn-rounded">Send nyhetsbrev</a>
        </div>
    </div>

</main>