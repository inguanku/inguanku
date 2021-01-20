<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container-fluid kontener bg-light px-0">
        <div class="container-fluid px-0">
            <nav class="navbar navbar-expand-lg shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="/"><img src="/images/logo1.svg" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/post/adopt">Adoption</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/post/breed">Breeding</a>
                            </li>
                        </ul>
                        <a href="/login" class="link-dark me-3">Login</a>
                        <a href="/register" class="btn btn-warning rounded-pill btn-sm button">Register</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid px-0">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
    <footer class="text-center vh-4 bottom-0 bg-white">
        <p>Copyright © 2020 Inguanku</p>
    </footer>


    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>