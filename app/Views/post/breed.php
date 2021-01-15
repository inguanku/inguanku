<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-3">
    <h2 class="mb-4">Breeding</h2>
    <div class="row g-3">
        <div class="col-md-5 col-lg-3 order-md-last">
            <form action="">
                <div class="mb-3 text-center">
                    <label for="location" class="col-form-label">Location</label>
                    <select class="form-select shadow-sm" id="location">
                        <option value="" selected disabled>Any</option>
                    </select>
                </div>
                <div class="mb-3 text-center">
                    <label for="location" class="col-form-label">Category</label>
                    <select class="form-select shadow-sm" id="location">
                        <option value="" selected disabled>Any</option>
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
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>