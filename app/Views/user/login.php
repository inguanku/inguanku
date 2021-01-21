<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inguanku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row bg-light">
            <div class="col-4 px-0">
                <div class="login-image"></div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-4 p-3">
                        <a class="" href="/"><img src="/images/logo1.svg" alt=""></a>
                    </div>
                    <div class="col-8">
                        <h5 class="text-end mt-3">Don't have an account? <a href="/register" class="btn btn-outline-dark btn-sm rounded-pill px-3">Get started</a></h5>
                    </div>
                </div>
                <div class="row justify-content-center d-flex align-items-center clogin">
                    <div class="col-6">
                        <h3 class="mb-4">Sign in to Inguanku</h3>
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"> <?= session()->getFlashdata('msg') ?> </div>
                        <?php endif; ?>
                        <form action="/user/auth" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" autofocus>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwd" name="passwd">
                            </div>
                            <div class="d-grid gap-2 col-3 mx-auto mt-4">
                                <button type="submit" class="btn btn-warning rounded-pill button">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>