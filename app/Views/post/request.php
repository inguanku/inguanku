<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>
<div class="container shadow my-5 bg-white p-5">
    <h1>Request List Need Confirm</h1>
    <ul class="list-group">
        <?php foreach ($postRequest as $request): ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <img src="/images/avatar/<?= ($request->avatar == '')? 'default.jpg': $request->avatar; ?>" class="little-avatar rounded-pill">
                        <span class="fw-bold"><?= $request->name ?></span> Requested to <?= $request->category ?>
                        <img src="/images/post/<?= $request->file_name; ?>"  class="little-avatar rounded-pill"> <span class="fw-bold"><?= $request->pet_name ?></span>
                    </div>
                    <div class="col-1">
                        <span class="badge bg-warning"><?= $request->status ?></span>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-sm btn-danger float-end mx-1">Decline</a>
                        <a href="" class="btn btn-sm btn-primary float-end mx-1">Accept</a>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
</div>

<?= $this->endSection(); ?>