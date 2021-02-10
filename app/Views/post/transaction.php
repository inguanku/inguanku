<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>
<div class="container shadow my-5 bg-white p-5">
    <h1 class="mb-2">Current Transaction</h1>
    <div class="row justify-content-center">
        <div class="col-10">
            <?php if($transactions):?>
                <?php foreach ($transactions as $transaction): ?>
            <div class="card text-center shadow mb-5">
                <div class="card-header">
                    <?php if ($transaction->status == 'Process'): ?>
                    <span class="badge bg-warning"><?= $transaction->status; ?></span>
                    <?php elseif ($transaction->status == 'Failed'): ?>
                    <span class="badge bg-danger"><?= $transaction->status; ?></span>
                    <?php elseif ($transaction->status == 'Success'): ?>
                    <span class="badge bg-success"><?= $transaction->status; ?></span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <h5 class="card-title"><?= ($transaction->name == $name)? 'You': $transaction->name; ?></h5>
                            <img src="/images/avatar/<?= ($transaction->avatar == '')? 'default.jpg': $transaction->avatar; ?>" class="medium-avatar rounded-pill">
                            <p>Phone number : <?= $transaction->phone; ?></p>
                        </div>
                        <div class="col-3 align-self-center">
                            <?php if ($transaction->name == $name):?>
                                <h5 class="card-title"><?= ($transaction->category == 'Adopt')? "Adopting": "Your Pet Breeding"; ?></h5>
                            <?php else:?>
                                <h5 class="card-title"><?= ($transaction->category == 'Adopt')? "Adopting": $transaction->name . "'s Pet Breeding"; ?></h5>
                            <?php endif;?>
                        </div>
                        <div class="col-3">
                            <h5 class="card-title"><?= $transaction->pet_name; ?></h5>
                            <img src="/images/post/<?= $transaction->file_name; ?>"  class="medium-avatar rounded-pill">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <a href="/transaction/process/complete/<?= $transaction->trans_id;?>" class="btn btn-primary">complete transaction</a>
                        </div>
                        <div class="col-4">
                            <a href="/transaction/process/cancel/<?= $transaction->trans_id;?>" class="btn btn-danger">cancel transaction</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
            <?php else:?>
            <li class="list-group-item">
                <h4 class="text-center text-muted">No Transaction</h4>
            </li>
            <?php endif;?>
        </div>
    </div>
    <h1>History</h1>
    <ul class="list-group">
        <?php if($histories):?>
        <?php foreach ($histories as $history): ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <?php if ($history->name == $name):?>
                            <img src="/images/avatar/<?= ($history->avatar == '')? 'default.jpg': $history->avatar; ?>" class="little-avatar rounded-pill">
                            <span class="fw-bold"><?= ($history->name == $name)? 'You': $history->name; ?></span>
                            <?= ($history->category == 'Adopt')? "Adopting": "Breeding your pet with"; ?>
                            <img src="/images/post/<?= $history->file_name; ?>"  class="little-avatar rounded-pill">
                            <span class="fw-bold"><?= $history->pet_name; ?></span>
                            <?php if ($history->status == 'Process'): ?>
                                <span class="badge bg-warning"><?= $history->status; ?></span>
                            <?php elseif ($history->status == 'Failed'): ?>
                                <span class="badge bg-danger"><?= $history->status; ?></span>
                            <?php elseif ($history->status == 'Success'): ?>
                                <span class="badge bg-success"><?= $history->status; ?></span>
                            <?php endif; ?>
                        <?php else:?>
                            <img src="/images/avatar/<?= ($history->avatar == '')? 'default.jpg': $history->avatar; ?>" class="little-avatar rounded-pill">
                            <span class="fw-bold"><?= ($history->name == $name)? 'You': $history->name; ?></span>
                            <?= ($history->category == 'Adopt')? "Adopting": $history->name . "'s Pet Breeding"; ?>
                            <img src="/images/post/<?= $history->file_name; ?>"  class="little-avatar rounded-pill">
                            <span class="fw-bold"><?= $history->pet_name; ?></span>
                            <?php if ($history->status == 'Process'): ?>
                                <span class="badge bg-warning"><?= $history->status; ?></span>
                            <?php elseif ($history->status == 'Failed'): ?>
                                <span class="badge bg-danger"><?= $history->status; ?></span>
                            <?php elseif ($history->status == 'Success'): ?>
                                <span class="badge bg-success"><?= $history->status; ?></span>
                            <?php endif; ?>
                        <?php endif;?>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
        <?php else:?>
            <li class="list-group-item">
                <h4 class="text-center text-muted">No Transaction</h4>
            </li>
        <?php endif;?>
    </ul>
</div>
<?= $this->endSection(); ?>