<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-0 bg-black">
    <div class="korsel-height">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <!-- <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol> -->
            <div class="carousel-inner korsel-height">
                <?php $i = 0; ?>
                <?php foreach ($dataDetail as $d) : ?>
                    <?php
                    print ($i == 0) ? "<div class='carousel-item active'>" :  "<div class='carousel-item'>";
                    $i++; ?>
                    <img src="/images/post/<?= $d['file_name']; ?>" class="d-block mx-auto fix-image" alt="...">
            </div>
        <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>

<div class="container card-detail shadow p-4 mt-5 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <h3><?= $dataDetail[0]['pet_name']; ?></h3>
                </div>
                <div class="col-12">
                    <p><?= $dataDetail[0]['breed']; ?></p>
                </div>
                <div class="col-12">
                    <p><?= $dataDetail[0]['sex']; ?></p>
                </div>
                <div class="col-12">
                    <p><?= $dataDetail[0]['status']; ?></p>
                </div>
                <div class="col-12">
                    <h3>Tentang</h3>
                    <p><?= $dataDetail[0]['description']; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="/images/avatar/<?= $dataDetail[0]['avatar']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-text"><?= $dataDetail[0]['name']; ?></h3>
                    <div class="card-text"><?= $dataDetail[0]['city']; ?></div>
                    <a href="#" class="mt-1 mx-auto d-block btn btn-warning">Request Me!</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

<?= $this->endSection(); ?>