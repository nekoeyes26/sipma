<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Orland - Beli Tiket Event dan Jual Eventmu Sendiri</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="img/carousel-1.jpg" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">SIPMA</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight">Sistem Informasi Pengaduan
                                Mahasiswa</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read
                                    More</button></a>
                            <a href="" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact
                                    Us</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel-2.jpg" class="img-fluid" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">SIPMA</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">Silahkan laporkan keluhan Anda
                            </h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read
                                    More</button></a>
                            <a href="" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact
                                    Us</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="img/about-1.jpg" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="img/about-2.jpg" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">About Us</h5>
                    <h1 class="mb-4">About Sistem Informasi Pengaduan Mahasiswa</h1>
                    <p>Sebuah sistem yang dirancang untuk membantu mahasiswa dalam mengajukan keluhan atau pengaduan
                        terkait berbagai hal di lingkungan kampus.</p>
                    <p class="mb-4">Membantu mahasiswa dalam mengajukan pengaduan terkait layanan akademik, keuangan,
                        sarana dan prasarana, serta berbagai permasalahan lainnya di lingkungan kampus</p>
                    <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Services Start -->
    <div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Tata Cara</h5>
                <h1>Alur Aduan</h1>
            </div>
            <div class="row g-5 services-inner">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa fa-code fa-7x mb-4 text-primary"></i>
                                <h4 class="mb-3">Tulis Aduan</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <!-- <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay=".5s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa fa-file-code fa-7x mb-4 text-primary"></i>
                                <h4 class="mb-3">Proses Tindak Lanjut</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <!-- <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay=".7s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa fa-external-link-alt fa-7x mb-4 text-primary"></i>
                                <h4 class="mb-3">Pemberian Solusi</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <!-- <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fas fa-user-secret fa-7x mb-4 text-primary"></i>
                                <h4 class="mb-3">Selesai</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut
                                    interdum.
                                    Aliquam dolor eget urna ultricies tincidunt.</p>
                                <!-- <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Team</h5>
                <h1>Meet our expert Team</h1>
            </div>
            <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-1.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-2.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-3.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-4.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    @include('footer')
    @include('script')
</body>

</html>
