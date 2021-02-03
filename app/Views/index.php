<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inguanku</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <div class="container-fluid bg-light p-0">
        <div class="container-fluid px-0 bg-light hero-image">
            <div class="container-fluid bg-transparent">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container">
                        <a class="navbar-brand" href="#"><img src="/images/logo.svg" alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bold" href="/post/adopt">Adoption</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light fw-bold" href="/post/breed">Breeding</a>
                                </li>
                            </ul>

                            <?php if ($user != null) : ?>
                                <div class="dropdown">
                                    <?php if ($user['avatar']): ?>
                                        <?php echo '<a href="#" id="dropdownMenuLink" class="me-3 fw-bold btn btn-sm btn-primary rounded-pill dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img src="/images/avatar/'. $user['avatar'] .'" class="little-avatar rounded-pill">' . $user['name'] . '<span class="badge bg-warning mx-1">4</span></a>' ?>
                                    <?php else: ?>
                                        <?php echo '<a href="#" id="dropdownMenuLink" class="me-3 fw-bold btn btn-sm btn-primary rounded-pill dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img src="/images/avatar/default.jpg" class="little-avatar rounded-pill">' . $user['name'] . '<span class="badge bg-warning mx-1">4</span></a>' ?>
                                    <?php endif; ?>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Resquest <span class="badge bg-warning">4</span></a></li>
                                        <li><a href="/user/logout" class="dropdown-item">Logout</a></li>
                                    </ul>
                                </div>
                            <?php else : ?>
                                <a href="/login" class="link-light me-3 fw-bold">Login</a>
                                <a href="/register" class="btn btn-warning rounded-pill btn-sm button fw-bold">Register</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container position-absolute top-50 start-50 translate-middle">
                <div class="p-5 rounded-lg text-light text-center" data-aos="fade-in" data-aos-delay="200" data-aos-offset="200">
                    <h1 class="display-4 fw-bold text-shadow-sm">Find your new friends</h1>
                    <p class="lead">Inguanku is a platform that connects donators and adopters.</p>
                    <a class="btn btn-outline-warning btn-lg rounded-pill" href="#about" role="button">Get Started</a>
                </div>
            </div>
        </div>

        <!-- ::::::::::::::: ABOUT US ::::::::::::::::::::::::-->
        <div class="container" data-aos="fade-up" data-aos-delay="200" data-aos-offset="200" id="about">
            <div class="pt-5 mt-5 pb-5">
                <div class="uppercase main-color font-weight-medium text-center text-lg-start">About us</div>
                <h2 class="text-color font-weight-semibold text-center text-lg-start">
                    Discover more about <br class="d-none d-sm-block">Inguanku
                </h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img src="./images/about.jpg" class="img-fluid float-lg-start float-none d-block d-lg-inline mx-lg-0 mx-auto">
                    <div class="clearfix"></div>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-between">
                    <h5 class="text-color pt-2">We bring together pet lovers</h5>
                    <p class="font-size-14 accent-text-color">
                        Inguanku is a place to meet pet lovers where animal lovers can find the pet they want to keep. And pet lovers can also find a partner for their pets to match.
                    </p>
                    <h5 class="text-color pt-2">What we can do?</h5>
                    <div class="d-flex">
                        <div class="mt-4">
                            <i data-feather="arrow-right" class="icon-16 main-color"></i>
                        </div>
                        <div class="ps-2">
                            <span class="main-color font-weight-medium"><strong class="text-orange">Adoption</strong></span>
                            <p class="font-size-14 accent-text-color">
                                Feature adoption, you can search many pet from around city in Indonesia, you can also post your
                                pet to give your pet to another pet lover.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div>
                            <i data-feather="arrow-right" class="icon-16 main-color"></i>
                        </div>
                        <div class="ps-2">
                            <span class="main-color font-weight-medium"><strong class="text-orange">Breeding</strong></span>
                            <p class="font-size-14 accent-text-color">
                                Feature adoption, you can search pet in this site to breed with your pet. Not just only human need love,
                                your pet also need love from another pet.
                            </p>
                        </div>
                    </div>
                    <div class="row pt-4 mt-3">
                        <h5 class="text-color pt-2">How to use ?</h5>
                        <div class="col-sm-4">
                            <i data-feather="search" class="icon-42 text-color d-block ms-auto me-auto"></i>
                            <p class="text-center font-size-14 text-color font-weight-medium mt-2">Search your favorite pet</p>
                        </div>
                        <div class="col-sm-4">
                            <i data-feather="thumbs-up" class="icon-42 text-color d-block ms-auto me-auto"></i>
                            <p class="text-center font-size-14 text-color font-weight-medium mt-2">Make a good deal with owner</p>
                        </div>
                        <div class="col-sm-4">
                            <i data-feather="heart" class="icon-42 text-color d-block ms-auto me-auto"></i>
                            <p class="text-center font-size-14 text-color font-weight-medium mt-2">Happy playing with a pet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ::::::::::::::: /END ABOUT US :::::::::::::::::::-->

        <!-- landing list -->
        <div class="bg-gradient-to-top pb-5" data-aos="fade-up" data-aos-delay="200" data-aos-offset="200">
            <div class="container">
                <div class="pt-5 mt-5 pb-5">
                    <h2 class="text-color font-weight-semibold text-center text-lg-start">
                        Latest people post
                    </h2>
                </div>
                <div class="row gy-lg-0 gy-5 wow wow animate__fadeInUp">
                    <?php foreach ($post as $p) : ?>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="card border-0 shadow-sm">
                                <img src="./images/post/<?= $p->file_name; ?>" class="card-img-top thumb-post" alt="...">
                                <div class="card-body">
                                    <p class="card-text d-flex justify-content-between">
                                        <span class="uppercase font-size-12 main-color font-weight-medium"><?= $p->category; ?></span>
                                        <span class="font-size-12 accent-text-color font-weight-medium">
                                            <?php
                                            $strDate = strtotime($p->date);
                                            echo date('d-m-Y', $strDate);
                                            ?>
                                        </span>
                                    </p>
                                    <h6 class="card-title text-color"><?php echo $p->pet_name; ?></h6>
                                    <p class="card-text accent-text-color font-size-12"><?php echo $p->description; ?></p>
                                    <a href="/post/detail/<?= $p->post_id; ?>" class="text-color text-decoration-none font-size-12">Read more <i data-feather="chevron-right" class="icon-12"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing list -->
    <!-- Footer -->
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
                        <li><a href="/login" class="accent-text-color text-decoration-none text-white">Login</a></li>
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
        AOS.init();
    </script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/feather.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>