<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
</head>

<body>

    <div class="container-fluid kontener bg-light px-0 pb-2">
        <div class="container-fluid px-0">
            <nav class="navbar navbar-expand-lg shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="/"><img src="/images/logo1.svg" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item" id="nav-item">
                                <a id="menuAdopt" class="nav-link text-dark fw-bold" href="/post/adopt">Adoption</a>
                            </li>
                            <li class="nav-item">
                                <a id="menuBreed" class="nav-link text-dark fw-bold" href="/post/breed">Breeding</a>
                            </li>
                        </ul>
                        <?php if ($user): ?>
                            <div class="dropdown">
                                <?php if ($user['avatar']): ?>
                                    <a href="#" id="dropdownMenuLink" class="me-3 fw-bold btn btn-sm btn-primary rounded-pill dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="/images/avatar/<?= $user['avatar'];?>" class="little-avatar rounded-pill">
                                        <?= $user['name'];?>
                                        <span class="badge bg-warning mx-1"><?= count($transactions) + count($postRequest)?></span>
                                    </a>
                                <?php else: ?>
                                    <a href="#" id="dropdownMenuLink" class="me-3 fw-bold btn btn-sm btn-primary rounded-pill dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="/images/avatar/default.jpg" class="little-avatar rounded-pill">
                                       <?=  $user['name']; ?>
                                        <span class="badge bg-warning mx-1"><?= count($transactions) + count($postRequest);?></span>
                                    </a>
                                <?php endif; ?>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                                    <li><a class="dropdown-item" href="/transaction">Transaction <span class="badge bg-warning"><?= count($transactions);?></span></a></li>
                                    <li><a class="dropdown-item" href="/post/requestList">Request <span class="badge bg-warning"><?= count($postRequest);?></span></a></li>
                                    <li><a href="/user/logout" class="dropdown-item">Logout</a></li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <a href="/login" class="link-dark me-3 fw-bold">Login</a>
                            <a href="/register" class="btn btn-warning rounded-pill btn-sm button fw-bold">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid px-0">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
    <div id="footer" class="pt-lg-5 pt-0 mt-0 text-center text-lg-start bg-dark text-white">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-sm-3">
                    <a href="#" class="accent-text-color text-decoration-none">
                        <h2 class="text-white">Inguanku</h2>
                    </a>
                    <p class="accent-text-color font-size-14 pt-3">
                        Inguanku is a place to meet pet lovers where animal lovers can find the pet they want to keep.
                    </p>
                </div>
                <div class="col-sm-3">
                    <h6 class="font-weight-semibold">Quick Link</h6>
                    <ul class="accent-text-color font-size-14 pt-3 list-unstyled">
                        <li><a href="/" class="accent-text-color text-decoration-none text-white">Home</a></li>
                        <li><a href="/post/adopt" class="accent-text-color text-decoration-none text-white">Adoption</a></li>
                        <li><a href="/post/breed" class="accent-text-color text-decoration-none text-white">Breeding</a></li>
                    </ul>
                </div>
            </div>
            <hr class="hr">
            <div class="row gy-4 gy-lg-0 pb-5 pb-lg-4">
                <div class="col-sm-4 font-size-14 accent-text-color text-center text-lg-start">&copy; 2021 Inguanku Team.</div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        var url = window.location.href;
        url = url.split('/');
        if(url[4] == 'adopt'){
            var menu_adopt = document.getElementById("menuAdopt");
            menu_adopt.classList.add("aktif");
        }else if(url[4] == 'breed'){
            var menu_breed = document.getElementById("menuBreed");
            menu_breed.classList.add("aktif");
        }else {
            var nav_item = document.getElementById("nav-item");
            nav_item.classList.remove("aktif");
        }

        AOS.init();
    </script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/feather.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>