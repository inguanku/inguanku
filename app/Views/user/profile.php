<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>

<div class="container shadow my-5 bg-white p-5">
    <form method="POST" enctype="multipart/form-data">
        <div class="row my-4 justify-content-center">
            <div class="col-4">
                <?php if ($avatar) : ?>
                    <img class="avatar d-block mx-auto rounded-pill my-3" src="/images/avatar/<?= $avatar; ?>" alt="">
                <?php else : ?>
                    <img class="avatar d-block mx-auto rounded-pill my-3" src="/images/avatar/default.jpg" alt="">
                <?php endif; ?>
                <div class="input-group">
                    <input type="file" class="form-control" id="avatar-input" onchange="previewImg()">
                </div>
            </div>
            <div class="col-6">
                <h2>Profile</h2>
                <input type="hidden" name="idHidden" value="<?= $id; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="<?= $user; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?= $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" value="<?= $phone; ?>">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" value="<?= $city; ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea rows="3" class="form-control" id="address" style="max-height: 150px;"><?= $address; ?></textarea>
                </div>
                <button type="submit" class="btn btn-warning">Save</button>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImg() {
        const avatar = document.querySelector('#avatar-input');
        const avatarPreview = document.querySelector('.avatar');

        const fileAvatar = new FileReader();
        fileAvatar.readAsDataURL(avatar.files[0]);

        fileAvatar.onload = function(event) {
            avatarPreview.src = event.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>