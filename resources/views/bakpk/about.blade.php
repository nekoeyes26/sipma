<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SIPMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('bakpk.navbar')
    <!-- About Start -->
    <div class="container-fluid py-4 my-3">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ asset('img/about-1.jpg') }}" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ asset('img/about-2.jpg') }}" class="img-fluid w-100 rounded" alt="">
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
                                <img src="{{ asset('img/team-1.jpeg') }}" class="img-fluid w-100 rounded-circle"
                                    alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Ardhilla Eka Windiarti</h4>
                                <p class="m-0">4.33.21.1.04</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="{{ asset('img/team-2.jpeg') }}" class="img-fluid w-100 rounded-circle"
                                    alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Bhatinden Sejiarga Ergun Giortagma</h4>
                                <p class="m-0">4.33.21.1.06</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="{{ asset('img/team-3.jpeg') }}" class="img-fluid w-100 rounded-circle"
                                    alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Indra Herdiana</h4>
                                <p class="m-0">4.33.21.1.13</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
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
                                <img src="{{ asset('img/team-4.jpeg') }}" class="img-fluid w-100 rounded-circle"
                                    alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Muhamad Alif Jauzi </h4>
                                <p class="m-0">4.33.21.1.17</p>
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
    @include('script')
</body>

</html>
