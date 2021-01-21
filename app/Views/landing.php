<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inguanku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container-fluid px-0 bg-light hero-image">
        <div class="container-fluid bg-transparent">
            <nav class="navbar navbar-expand-lg shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="/images/logo.svg" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/post/adopt">Adoption</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/post/breed">Breeding</a>
                            </li>
                        </ul>
                        
                        <?php if($data):?>
                            <?php echo '<a href="#" class="link-light me-3">Hello, '.$data.'</a>'?>
                            <a href="/user/logout" class="link-light me-3">Logout</a>
                        <?php else:?>
                            <a href="/login" class="link-light me-3">Login</a>
                            <a href="/register" class="btn btn-warning rounded-pill btn-sm button">Register</a>
                        <?php endif;?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="p-5 rounded-lg text-light text-center">
                <h1 class="display-4">Find your new friends</h1>
                <p class="lead">Inguanku is a platform that connects donators and adopters.</p>
                <a class="btn btn-outline-warning btn-lg rounded-pill" href="#" role="button">Find here!</a>
            </div>
        </div>
    </div>

    <!-- ::::::::::::::: ABOUT US ::::::::::::::::::::::::-->
    <div class="container wow animate__fadeInUp" id="about">
        <div class="pt-5 mt-5 pb-5">
            <div class="uppercase main-color font-weight-medium text-center text-lg-start">About us</div>
            <h2 class="text-color font-weight-semibold text-center text-lg-start">
                Discover more about <br class="d-none d-sm-block">Inguanku
            </h2>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <img src="./images/illustration/05.png" alt="1" class="img-fluid float-lg-start float-none d-block d-lg-inline mx-lg-0 mx-auto">
                <div class="clearfix"></div>
            </div>
            <div class="col-12 col-lg-6">
                <h5 class="text-color pt-2">We bring together pet lovers</h5>
                <p class="font-size-14 accent-text-color">
                    Inguanku is a place to meet pet lovers where animal lovers can find the pet they want to keep. And pet lovers can also find a partner for their pets to match. 
                </p>
                <div class="d-flex">
                    <div>
                        <i data-feather="arrow-right" class="icon-16 main-color"></i>
                    </div>
                    <div class="ps-2">
                        <span class="main-color font-weight-medium">Adoption</span>
                        <p class="font-size-14 accent-text-color">
                            You can adopt a pet.
                        </p>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <div>
                        <i data-feather="arrow-right" class="icon-16 main-color"></i>
                    </div>
                    <div class="ps-2">
                        <span class="main-color font-weight-medium">Breeding</span>
                        <p class="font-size-14 accent-text-color">
                            You can breed your pet with other pet owner.
                        </p>
                    </div>
                </div>
                <div class="row pt-4">
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
    <div class="bg-gradient-to-top pb-5">
        <div class="container">
            <div class="pt-5 mt-5 pb-5">
                <h2 class="text-color font-weight-semibold text-center text-lg-start">
                    Latest news pet can adopt
                </h2>
            </div>
            <div class="row gy-lg-0 gy-5 wow wow animate__fadeInUp">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="./images/illustration/10.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text d-flex justify-content-between">
                              <span class="uppercase font-size-12 main-color font-weight-medium">Adopt</span>
                              <span class="font-size-12 accent-text-color font-weight-medium">December 01, 2020</span>
                          </p>
                          <h6 class="card-title text-color">Pablo the blacky cat</h6>
                          <p class="card-text accent-text-color font-size-12">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-color text-decoration-none font-size-12">Read more <i data-feather="chevron-right" class="icon-12"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="./images/illustration/10.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text d-flex justify-content-between">
                              <span class="uppercase font-size-12 main-color font-weight-medium">Adopt</span>
                              <span class="font-size-12 accent-text-color font-weight-medium">December 01, 2020</span>
                          </p>
                          <h6 class="card-title text-color">Kitty the beauty</h6>
                          <p class="card-text accent-text-color font-size-12">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-color text-decoration-none font-size-12">Read more <i data-feather="chevron-right" class="icon-12"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="./images/illustration/10.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text d-flex justify-content-between">
                              <span class="uppercase font-size-12 main-color font-weight-medium">Adopt</span>
                              <span class="font-size-12 accent-text-color font-weight-medium">December 01, 2020</span>
                          </p>
                          <h6 class="card-title text-color">Pablo the blacky cat</h6>
                          <p class="card-text accent-text-color font-size-12">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-color text-decoration-none font-size-12">Read more <i data-feather="chevron-right" class="icon-12"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="./images/illustration/10.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text d-flex justify-content-between">
                              <span class="uppercase font-size-12 main-color font-weight-medium">Adopt</span>
                              <span class="font-size-12 accent-text-color font-weight-medium">December 01, 2020</span>
                          </p>
                          <h6 class="card-title text-color">Kitty the beauty</h6>
                          <p class="card-text accent-text-color font-size-12">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="text-color text-decoration-none font-size-12">Read more <i data-feather="chevron-right" class="icon-12"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing list -->

    <!-- Footer -->
    <div id="footer" class="pt-lg-5 pt-0 mt-0 mt-lg-5 text-center text-lg-start bg-dark text-white">
        <div class="container">
            <div class="row gy-4">
                <div class="col-sm-3">
                    <a href="#" class="accent-text-color text-decoration-none"><h2 class="text-white">Inguanku</h2></a>
                    <p class="accent-text-color font-size-14 pt-3">
                        Inguanku is a place to meet pet lovers where animal lovers can find the pet they want to keep.
                    </p>
                </div>
                <div class="col-sm-3">
                    <h6 class="font-weight-semibold">Quick Link</h6>
                    <ul class="accent-text-color font-size-14 pt-3 list-unstyled">
                        <li><a href="#" class="accent-text-color text-decoration-none">Home</a></li>
                        <li><a href="#" class="accent-text-color text-decoration-none">Adoption</a></li>
                        <li><a href="#" class="accent-text-color text-decoration-none">Breeding</a></li>
                        <li><a href="#" class="accent-text-color text-decoration-none">Login</a></li>
                    </ul>
                </div>
            </div>
            <hr class="hr">
            <div class="row gy-4 gy-lg-0 pb-5 pb-lg-4">
                <div class="col-sm-4 font-size-14 accent-text-color text-center text-lg-start">&copy; 2021 Inguanku Team.</div>
                <div class="col-sm-4 text-lg-end text-center">
                    <ul class="list-unstyled font-size-14 list-inline mb-0">
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="#"><i data-feather="facebook" class="icon-24"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="#"><i data-feather="twitter" class="icon-24"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="#"><i data-feather="instagram" class="icon-24"></i></a></li>
                        <li class="list-inline-item"><a class="accent-text-color text-decoration-none" href="#"><i data-feather="slack" class="icon-24"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="./js/feather.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>