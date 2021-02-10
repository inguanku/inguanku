<?= $this->extend('post/template'); ?>

<?= $this->section('content'); ?>
<div class="container shadow my-5 bg-white p-5">
    <h1>Request List Need Confirm</h1>

    
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
    
</div>

<?= $this->endSection(); ?>