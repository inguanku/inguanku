<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-0 bg-black">
    <div class="korsel-height">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner korsel-height">
                <div class="carousel-item active">
                    <img src="/images/post/dog1.png" class="d-block mx-auto fix-image" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/post/dog1.png" class="d-block mx-auto fix-image" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/login.png" class="d-block mx-auto fix-image" alt="...">
                </div>
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
                        <h3>Nama</h3>
                    </div>
                    <div class="col-12">
                        <p>Breed hewan</p>
                    </div>
                    <div class="col-12">
                        <p>Umur-Gender-Penyakit</p>
                    </div>
                    <div class="col-12">
                        <p>Tersedia untuk breeding?</p>
                    </div>
                    <div class="col-12">
                        <h3>Tentang</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis in vestibulum turpis. Praesent eu laoreet quam. Vestibulum magna lacus, facilisis at velit nec, dictum feugiat massa. Quisque et mi dapibus, aliquet enim venenatis, pellentesque metus. Integer blandit massa quis nisl gravida, quis accumsan turpis euismod. Etiam tellus mauris, pulvinar vitae consequat eget, ullamcorper tincidunt dolor. Sed fermentum et neque vitae viverra. In et luctus nunc. Morbi fermentum sollicitudin enim, et accumsan purus tincidunt id. Ut elementum tortor sit amet ex suscipit, eget tincidunt ex bibendum. Nullam arcu dolor, maximus sed efficitur sed, pretium vitae odio. Ut non nisl purus. In ac interdum elit. Nunc volutpat nisl ac placerat tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 18rem;">
                    <img class="card-img-top" src="/images/post/dog1.png" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-text">Owner</h3>
                        <div class="card-text">Tasikmalaya</div>
                        <a href="#" class="mt-1 mx-auto d-block btn btn-warning">Request Me!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?= $this->endSection(); ?>