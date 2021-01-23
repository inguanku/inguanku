<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container shadow my-5 bg-white p-5">
    <form>
        <div class="row my-4 justify-content-center">
            <div class="col-4">
                <img class="avatar d-block mx-auto rounded-pill my-3" src="/images/avatar/default.jpg" alt="">
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile02">
                </div>
            </div>
            <div class="col-6">
                <h2>Profile</h2>
                <input type="hidden">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea rows="3" class="form-control" id="address" style="max-height: 150px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>