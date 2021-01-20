<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-3">
    <h2 class="mb-4">Adoption</h2>
    <div class="row g-3">
        <div class="col-md-5 col-lg-3 order-md-last">
            <form action="">
                <div class="mb-3 text-center">
                    <label for="location" class="col-form-label">Location</label>
                    <select class="form-select shadow-sm" id="location">
                        <option value="">All</option>
                    </select>
                </div>
                <div class="mb-3 text-center">
                    <label for="location" class="col-form-label">Category</label>
                    <select class="form-select shadow-sm" id="location">
                        <option value="">All</option>
                        <option value="">Cat</option>
                        <option value="">Dog</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-7 col-lg-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php for ($i = 0; $i < 10; $i++) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="#" class="link-dark">
                                <div class="konten">
                                    <img src="/images/login.png" class="card-img thumb-post" alt="...">
                                    <a href="/post/detail">
                                        <div class="overlay">
                                            <h4 class="overlay-text">
                                                Detail
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="#" class="link-dark">
                                    <h5 class="d-inline">Dwi</h5>
                                </a>
                                <p class="card-text">Rancah</p>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>