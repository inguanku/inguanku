<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container shadow my-5 bg-white p-5">
    <form action="/post/process" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <h2>Post Adopt</h2>
                <div class="mb-3">
                    <label for="pictures" class="form-label">Pictures</label>
                    <input type="file" class="form-control" name="pictures" id="pictures" multiple>
                </div>
                <div class="mb-3">
                    <label for="petName" class="form-label">Pet Name</label>
                    <input type="text" class="form-control" id="petName">
                </div>
                <div class="mb-3">
                    <label for="sex" class="form-label">Sex</label>
                    <select name="sex" id="sex" class="form-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select">
                        <option value="cat">Cat</option>
                        <option value="dog">Dog</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="breed" class="form-label">Breed</label>
                    <input type="text" class="form-control" id="breed" value="">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description"></textarea>
                </div>
                <button type="submit" class="btn btn-warning">Save</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>