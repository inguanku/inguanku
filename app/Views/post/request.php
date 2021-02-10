<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>
<div class="container shadow my-5 bg-white p-5">
    <h1>Request List Need Confirm</h1>
<<<<<<< HEAD

    
    <table class="table caption-top">
    <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>
    
=======
    <ul class="list-group mb-5">
        <?php if($postRequest):?>
            <?php foreach ($postRequest as $request): ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col">
                            <img src="/images/avatar/<?= ($request->avatar == '')? 'default.jpg': $request->avatar; ?>" class="little-avatar rounded-pill">
                            <?php if ($request->category == 'Adopt'): ?>
                                <span class="fw-bold"><?= $request->name ?></span>
                                Requested to Adopting
                                <img src="/images/post/<?= $request->file_name; ?>"  class="little-avatar rounded-pill"> <span class="fw-bold"><?= $request->pet_name ?></span>
                            <?php else:?>
                                <span class="fw-bold"><?= $request->name ?></span>
                                Requested to Breeding their pet with
                                <img src="/images/post/<?= $request->file_name; ?>"  class="little-avatar rounded-pill"> <span class="fw-bold"><?= $request->pet_name ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-3">
                            <a href="/transaction/confirm/decline/<?= $request->request_id; ?>" class="btn btn-sm btn-danger float-end mx-1">Decline</a>
                            <a href="/transaction/confirm/accept/<?= $request->request_id; ?>" class="btn btn-sm btn-primary float-end mx-1">Accept</a>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
        <?php else:?>
            <li class="list-group-item">
                <h4 class="text-center text-muted">No request</h4>
            </li>
        <?php endif;?>
    </ul>
    <h1>My Requests</h1>
    <ul class="list-group">
        <?php if($myRequests):?>
            <?php foreach ($myRequests as $myRequest): ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        Your request to <img src="/images/post/<?= $myRequest->file_name;?>" class="little-avatar rounded-pill"><span class="fw-bold"> <?= $myRequest->pet_name;?></span> is
                        <?php if ($myRequest->status == 'Accepted'):?>
                            <span class="badge bg-success"><?= $myRequest->status;?></span>
                        <?php elseif ($myRequest->status == 'Pending'):?>
                            <span class="badge bg-warning"><?= $myRequest->status; ?></span>
                        <?php elseif ($myRequest->status == 'Declined'):?>
                            <span class="badge bg-danger"><?= $myRequest->status; ?></span>
                        <?php endif;?>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
        <?php else:?>
        <li class="list-group-item">
            <h4 class="text-center text-muted">No request</h4>
        </li>
        <?php endif;?>
    </ul>
>>>>>>> develop
</div>

<?= $this->endSection(); ?>