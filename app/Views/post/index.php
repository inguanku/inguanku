<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-3">
    <h2 class="mb-4"><?= $heading; ?></h2>
    <div class="row g-3">
        <div class="col-md-5 col-lg-3 order-md-last">
            <form action="/post/<?= $category; ?>" method="GET" >
                <div class="mb-3 text-center">
                    <label for="location" class="col-form-label">Location</label>
                    <div class="row">
                        <div class="col-6">
                            <select class="form-select shadow-sm" id="location" name="location">
                                <option value="">All</option>
                                <?php foreach ($userData as $row):?>
                                    <option value="<?= $row['city'];?>" <?= ($row['city'] == $selectedLocation)? 'selected': null;?>><?= $row['city'];?></option>
                                <?php endforeach;?>
                            </select></div>
                        <div class="col-6">
                            <button class="btn btn-primary">search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-7 col-lg-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card bg-warning shadow-sm">
                        <a href="#" class="link-dark">
                            <div class="konten">
                                <img src="/images/add-post.jpg" class="card-img thumb-post" alt="...">
                                <a href="/<?= $category; ?>/add">
                                    <div class="overlay">
                                        <h4 class="overlay-text">
                                            <i data-feather="plus-circle" class="add-icon"></i>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        </a>
                        <div class=" card-body">
                            <a href="#" class="link-dark">
                                <h5 class="d-inline">ADD</h5>
                            </a>
                            <p class="card-text">Post your pet here!</p>
                        </div>
                    </div>
                </div>
                <?php foreach ($post as $data) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="#" class="link-dark">
                                <div class="konten">
                                    <img src="/images/post/<?= $data['file_name']; ?>" class="card-img thumb-post" alt="...">
                                    <a href="/post/detail/<?= $data['post_id']; ?>">
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
                                    <h5 class="d-inline"><?= $data['pet_name']; ?></h5>
                                </a>
                                <p class="card-text"><?= $data['city']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>