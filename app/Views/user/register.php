<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Inguanku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row bg-light">
            <div class="col-4 px-0">
                <div class="register-image"></div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-4 p-3">
                        <a class="" href="/"><img src="/images/logo1.svg" alt=""></a>
                    </div>
                    <div class="col-8">
                        <h5 class="text-end mt-3">Already have an account? <a href="/login" class="btn btn-outline-dark btn-sm rounded-pill px-3">Login</a></h5>
                    </div>
                </div>
                <div class="row justify-content-center d-flex align-items-center clogin">
                    <div class="col-6">
                        <h3 class="mb-4">Get started absolutely free</h3>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="passwd" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwd">
                            </div>
                            <div class="mb-3">
                                <label for="passwdConf" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="passwdConf">
                            </div>
                            <div class="d-grid gap-2 col-3 mx-auto mt-4">
                                <button type="submit" class="btn btn-warning rounded-pill button">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>