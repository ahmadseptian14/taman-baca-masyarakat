<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Taman Baca Masyarakat</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
       <section>
        <nav class="navbar navbar-expand-lg navbar-light pt-3 pt-lg-5">
            <style scoped>
                @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");

                * {
                    font-family: 'Inter', sans-serif !important;
                }

                body {
                    background-color: #FFFFFF;
                }

                body nav .navbar-brand h5 {
                    font-weight: 700 !important;
                    size: 28px;
                    line-height: 150%;
                }

                body nav .navbar-nav .nav-link {
                    font-size: 16px;
                    font-weight: 600;
                    color: #739AD4 !important;
                    margin: 0 30px;
                }

                body nav .navbar-nav .active {
                    color: #080E09 !important;
                    width: 100%;
                    display: -webkit-box !important;
                    display: -ms-flexbox !important;
                    display: flex !important;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                }

                body nav .navbar-nav .active a {
                    width: 12px;
                }

                body nav .navbar-nav .border-bottom {
                    border-bottom: 2px solid #0F52BA !important;
                }

                @media screen and (min-width: 993px) {
                    body nav .navbar-nav {
                        margin-left: 560px;
                    }
                }
            </style>

            <div class="container">
                <a class="navbar-brand" href="#">
                    <h5 class="mb-0">Taman Baca Masyarakat</h5>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">TBM</a>
                        </li>
                        @guest
                        <li class="nav-item d-flex justify-content-center">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Hi, {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                      
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                                </form>
                              </li>
                             
                        @endauth
                       
                    </ul>
                </div>
            </div>
        </nav>

        <section class="container">
            <style scoped>
                /* @media screen and (min-width: 768px) {
                    body .pl-house {
                        margin: 0 !important;
                        padding-left: 100px;
                    }
                }

                @media screen and (max-width: 768px) {
                    body .pl-house {
                        margin: 0 10px 0 5px !important;
                    }
                } */

                body #header {
                    margin-top: 138px;
                    margin-bottom: 100px;
                    width: 100% !important;
                }

                @media screen and (max-width: 768px) {
                    body #header {
                        margin-top: 50px;
                        margin-bottom: 50px;
                    }
                }

                body .img-header {
                    z-index: -1;
                    position: absolute;
                    top: 0;
                    right: 0;
                }

                body .explore {
                    background-color: #080E09;
                    padding-top: 100px;
                    padding-bottom: 50px;
                }

                @media screen and (max-width: 768px) {
                    body .explore {
                        padding-top: 50px;
                        padding-bottom: 50px;
                    }
                }

                body .explore .descript-explore {
                    max-width: 75%;
                }

                body .pt-35 {
                    padding-top: 35px;
                }

                body .title h1 {
                    font-size: 72px;
                    font-weight: 700;
                    line-height: 150%;
                }

                @media screen and (max-width: 768px) {
                    body .title h1 {
                        font-size: 48px;
                    }
                }

                body .stat {
                    margin-top: 48px;
                }

                body .stat h2 {
                    font-size: 48px;
                    font-weight: 800;
                }

                @media screen and (max-width: 768px) {
                    body .stat h2 {
                        font-size: 28px;
                    }
                }

                body .stat p {
                    font-size: 16px;
                    color: #ADB2B8;
                    font-weight: 400;
                    line-height: 28px;
                }

                body .stat .descript-head {
                    max-width: 90%;
                }

                body .btn-blue {
                    background-color: #0F52BA;
                    color: white;
                    font-weight: 600;
                    font-size: 16px;
                    border-radius: 12px;
                    margin-top: 48px;
                }

                body .gallery {
                    padding: 10px 0;
                }

                @media only screen and (max-width: 768px) {
                    body .gallery {
                        margin: 50px 0;
                    }
                }

                body .gallery .card-hotel-carousel {
                    width: 325px;
                    margin-right: 64px;
                    padding: 28px 28px 40px;
                    border-radius: 28px;
                    background: white;
                    -webkit-box-shadow: 20px 8px 18px rgba(178, 177, 255, 0.05);
                    box-shadow: 20px 8px 18px rgba(178, 177, 255, 0.05);
                }

                @media only screen and (max-width: 768px) {
                    body .gallery .card-hotel-carousel {
                        margin-right: 20px;
                    }
                }

                body .gallery .card-hotel-carousel .image-placeholder {
                    width: 268px;
                    height: 190px;
                }

                body .gallery .card-hotel-carousel .image-placeholder img {
                    width: 100%;
                    height: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;
                    border-radius: 16px;
                }

                body .gallery .card-hotel-carousel .card-details {
                    padding-bottom: 53px;
                    height: 150px;
                }

                body .gallery .card-hotel-carousel .card-details .caption {
                    font-weight: 700;
                    font-size: 24px;
                    color: #080E09;
                    margin-top: 24px;
                }

                body .gallery .card-hotel-carousel .card-details .sub-caption {
                    font-weight: 400;
                    color: #ADB2B8;
                }

                body .gallery .card-hotel-carousel .bottom-text .price-content {
                    color: #080E09;
                    font-size: 16px;
                }

                body .gallery .card-hotel-carousel .bottom-text .price-content span {
                    font-weight: 400;
                }

                body .gallery .card-hotel-carousel .bottom-text .price-content span.price {
                    font-weight: 700;
                }

                body .gallery .card-hotel-carousel .bottom-text .rating {
                    font-weight: 700;
                    font-size: 16px;
                    color: #FF9900;
                }

                body .gallery .card-hotel-carousel .bottom-text .rating img {
                    margin-top: -1px;
                    margin-right: 5px;
                }

                @media screen and (min-width: 600px) {
                    body .image-content .img-fluid {
                        height: 144.953px;
                    }
                }

                body .text-content h1 {
                    font-size: 60px !important;
                    line-height: 150%;
                    color: white;
                }

                body .text-content p {
                    font-size: 16px;
                    color: #ADB2B8;
                    font-weight: 400;
                    line-height: 28px;
                    padding-bottom: 108px;
                }

                body .place .img-place-header {
                    width: 100% !important;
                }

                body .scrolling-wrapper {
                    overflow-x: auto;
                }

                body .section::-webkit-scrollbar {
                    height: 0 !important;
                }

                body .section::-webkit-scrollbar-track {
                    background-color: #e4e4e4;
                    border-radius: 100px;
                }

                body .section::-webkit-scrollbar-thumb {
                    background-color: #05BB2D;
                    border-radius: 100px;
                }
            </style>
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/bg-header.svg"
                alt="bg-header" class="img-header d-none d-md-block">
            <div class="row mx-0" id="header">
                <div class="col-xl-6">
                    <div class="title">
                        <h1>
                          Dengan membaca kita akan tahu isi dunia
                        </h1>
                    </div>
                    <div class="d-flex stat">
                        <div class="text-left me-4 me-md-5">
                            <h2>
                                37
                            </h2>
                            <p>
                                Kategori
                            </p>
                        </div>
                        <div class="vr"></div>
                        <div class="px-md-5 px-4">
                            <h2>
                                80
                            </h2>
                            <p>
                                Judul
                            </p>
                        </div>
                        <div class="vr"></div>
                        <div class="ms-4 ms-md-5">
                            <h2>
                                760
                            </h2>
                            <p>
                                Taman Baca Masyarakat
                            </p>
                        </div>
                    </div>
                    <div class="stat">
                        <p class="descript-head">
                            Mari kita memperluas pengetahuan kita melalui membaca, karena dengan membaca buku kita mendapatkan banyak manfaat dan pengalaman dalam hidup.
                        </p>
                    </div>
                    <div>
                        <a href="{{route('buku.anggota')}}" class="btn btn-blue px-5 py-3 shadow">
                            Cari Buku
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 my-auto">
                    <div class="gallery row p-md-4 section scrolling-wrapper flex-row flex-nowrap">
                        <!-- CARD 1 -->
                        <div class="card-hotel-carousel">
                            <div class="image-placeholder">
                                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/place.png"
                                    alt="images" />
                            </div>
                            <div class="card-details">
                                <div class="caption">Tretes Hotel INA</div>
                                <span class="sub-caption">150m</span>
                            </div>
                            <div class="bottom-text d-flex flex-row justify-content-between">
                                <div class="price-content flex-grow-1">
                                    <span>Start from</span> <span class="price">40 USD</span>
                                </div>
                                <div class="rating d-flex align-items-center">
                                    <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/star-yellow.svg"
                                        alt="star" />
                                    <span>4.8</span>
                                </div>
                            </div>
                        </div>
                        <!-- END CARD 1 -->
                        <!-- CARD 2 -->
                        <div class="card-hotel-carousel">
                            <div class="image-placeholder">
                                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/place-2.png"
                                    alt="images" />
                            </div>
                            <div class="card-details">
                                <div class="caption">Hotel Mawar & Melati Putih</div>
                                <span class="sub-caption">120m</span>
                            </div>
                            <div class="bottom-text d-flex flex-row justify-content-between">
                                <div class="price-content flex-grow-1">
                                    <span>Start from</span> <span class="price">40 USD</span>
                                </div>
                                <div class="rating d-flex align-items-center">
                                    <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/star-yellow.svg"
                                        alt="star" />
                                    <span>4.8</span>
                                </div>
                            </div>
                        </div>
                        <!-- END CARD 2 -->
                        <!-- CARD 3 -->
                        <div class="card-hotel-carousel">
                            <div class="image-placeholder">
                                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/place.png"
                                    alt="images" />
                            </div>
                            <div class="card-details">
                                <div class="caption">Tretes Hotel INA</div>
                                <span class="sub-caption">150m</span>
                            </div>
                            <div class="bottom-text d-flex flex-row justify-content-between">
                                <div class="price-content flex-grow-1">
                                    <span>Start from</span> <span class="price">40 USD</span>
                                </div>
                                <div class="rating d-flex align-items-center">
                                    <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-House/star-yellow.svg"
                                        alt="star" />
                                    <span>4.8</span>
                                </div>
                            </div>
                        </div>
                        <!-- END CARD 3 -->
                    </div>
                </div>
            </div>
        </section>

    </section><section class="h-100 w-100" style="box-sizing: border-box; background-color: #000000; ">
    <style scoped>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      .content-2-4 .btn:focus,
      .content-2-4 .btn:active {
        outline: none !important;
      }

      .content-2-4 .title-text {
        padding-top: 5rem;
        margin-bottom: 3rem;
      }

      .content-2-4 .text-title {
        font: 600 2.25rem/2.5rem Poppins, sans-serif;
        margin-bottom: 0.625rem;
      }

      .content-2-4 .text-caption {
        color: #e7e7e8;
        font-weight: 300;
      }

      .content-2-4 .column {
        padding: 2rem 2.25rem;
      }

      .content-2-4 .icon {
        margin-bottom: 1.5rem;
      }

      .content-2-4 .icon-title {
        font: 500 1.5rem/2rem Poppins, sans-serif;
        margin-bottom: 0.625rem;
      }

      .content-2-4 .icon-caption {
        font: 400 1rem/1.625 Poppins, sans-serif;
        letter-spacing: 0.025em;
        color: #999999;
      }

      .content-2-4 .card {
        padding: 1.75rem;
        background-color: #0d0d17;
        border-radius: 0.75rem;
        border: 1px solid #303030;
      }

      .content-2-4 .card-block {
        padding: 1rem 1rem 5rem;
      }

      .content-2-4 .card-title {
        font: 600 1.5rem/2rem Poppins, sans-serif;
        margin-bottom: 0.625rem;
      }

      .content-2-4 .card-caption {
        font: 300 1rem/1.5rem Poppins, sans-serif;
        color: #999999;
        letter-spacing: 0.025em;
        margin-bottom: 0;
      }

      .content-2-4 .btn-card {
        font: 700 1rem/1.5rem Poppins, sans-serif;
        color: #000000;
        background-image: linear-gradient(rgba(208, 254, 123, 1),
            rgba(163, 252, 158, 1));
        padding-top: 1rem;
        padding-bottom: 1rem;
        width: 100%;
        border-radius: 0.75rem;
        margin-bottom: 1.25rem;
        border: none;
      }

      .content-2-4 .btn-card:hover {
        color: #000000;
        --tw-shadow: inset 0 0px 18px 0 rgba(0, 0, 0, 0.7);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
          var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
      }

      .content-2-4 .btn-outline {
        font: 400 1rem/1.5rem Poppins, sans-serif;
        color: #47475c;
        border: 1px solid #47475c;
        padding-top: 1rem;
        padding-bottom: 1rem;
        width: 100%;
        border-radius: 0.75rem;
      }

      .content-2-4 .btn-outline:hover {
        border: 1px solid #ffffff;
        color: #ffffff;
      }

      .content-2-4 .card-text {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
      }

      .content-2-4 .grid-padding {
        padding: 0rem 1rem 3rem;
      }

      @media (min-width: 576px) {
        .content-2-4 .grid-padding {
          padding: 0rem 2rem 3rem;
        }

        .content-2-4 .card-block {
          padding: 3rem 2rem 5rem;
        }
      }

      @media (min-width: 768px) {
        .content-2-4 .grid-padding {
          padding: 0rem 4rem 3rem;
        }

        .content-2-4 .card-block {
          padding: 3rem 4rem 5rem;
        }
      }

      @media (min-width: 992px) {
        .content-2-4 .grid-padding {
          padding: 1rem 6rem 3rem;
        }

        .content-2-4 .card-block {
          padding: 3rem 6rem 5rem;
        }

        .content-2-4 .column {
          padding: 0rem 2.25rem;
        }
      }

      @media (min-width: 1200px) {
        .grid-padding {
          padding: 1rem 10rem 3rem;
        }

        .content-2-4 .card-block {
          padding: 3rem 6rem 5rem;
        }

        .content-2-4 .card-btn-space {
          margin-top: 15px;
          margin-bottom: 15px;
        }

        .content-2-4 .btn-outline,
        .content-2-4 .btn-card {
          width: 95%;
          float: right;
        }
      }

      @media (max-width: 980px) {
        .content-2-4 .card-btn-space {
          width: 100%;
        }
      }
    </style>
    <div class="content-2-4 container-xxl mx-auto p-0  position-relative" style="font-family: 'Poppins', sans-serif">
      <div class="text-center title-text">
        <h1 class="text-title text-white">3 Keys Benefit</h1>
        <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
          You can easily manage your business with a powerful tools
        </p>
      </div>

      <div class="grid-padding text-center">
        <div class="row">
          <div class="col-lg-4 column">
            <div class="icon">
              <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-11.png"
                alt="" />
            </div>
            <h3 class="icon-title text-white">Easy to Operate</h3>
            <p class="icon-caption">
              This can easily help you to<br />
              grow up your business fast
            </p>
          </div>
          <div class="col-lg-4 column">
            <div class="icon">
              <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-12.png"
                alt="" />
            </div>
            <h3 class="icon-title text-white">Real-Time Analytic</h3>
            <p class="icon-caption">
              With real-time analytics, you<br />
              can check data in real time
            </p>
          </div>
          <div class="col-lg-4 column">
            <div class="icon">
              <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-13.png"
                alt="" />
            </div>
            <h3 class="icon-title text-white">Very Full Secured</h3>
            <p class="icon-caption">
              With real-time analytics, we<br />
              will guarantee your data
            </p>
          </div>
        </div>
      </div>

      <div class="card-block">
        <div class="card">
          <div class="d-flex flex-lg-row flex-column align-items-center">
            <div class="me-lg-3">
              <img
                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-1%20(1).png"
                alt="" />
            </div>
            <div class="flex-grow-1 text-lg-start text-center card-text">
              <h3 class="card-title text-white">
                Fast Business Management in 30 minutes
              </h3>
              <p class="card-caption">
                Our tools for business analysis helps an organization
                understand<br class="d-none d-lg-block " />
                market or business development.
              </p>
            </div>
            <div class="card-btn-space">
              <button class="btn btn-card">Buy Now</button>
              <button class="btn btn-outline">Demo Version</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><footer class="page-footer font-small blue">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap");

        * {
            font-family: 'Inter', sans-serif !important;
        }

        body .font-red-hat-display {
            font-family: 'Red Hat Display', sans-serif !important;
        }

        body footer {
            background: #313E60;
            padding-top: 50px;
            padding-bottom: 70px;
        }

        body footer {
            background: #0F0F0F;
            padding-top: 50px;
            padding-bottom: 70px;
        }

        body footer .logo {
            font-family: 'Red Hat Display', sans-serif;
            font-weight: 700;
            font-size: 26px;
            line-height: 38px;
            color: #FAFAFD;
        }

        body footer .social-media {
            margin-top: 55px;
        }

        body footer .copyright {
            font-family: 'Red Hat Display', sans-serif !important;
            font-weight: 400;
            font-size: 16px;
            line-height: 135%;
            color: #FAFAFD;
            margin-top: 20px;
        }

        body footer .nav-footer p {
            font-weight: 700 !important;
            font-family: 'Red Hat Display', sans-serif !important;
            font-size: 20px;
            line-height: 135%;
            color: #FAFAFD;
        }

        body footer .nav-footer a {
            font-weight: 400 !important;
            font-family: 'Red Hat Display', sans-serif !important;
            font-size: 20px;
            line-height: 135%;
            color: #FAFAFD;
        }

        body footer li {
            margin-bottom: 16px;
        }
    </style>
    <div class="container text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3 address">
                <div class="logo font-red-hat-display">
                    GivMoney
                </div>
                <div class="social-media">
                    <a href="#">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/bi_linkedin.svg"
                            alt="linkedin" class="img-fluid mr-4">
                    </a>
                    <a href="#">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/bi_facebook.svg"
                            alt="facebook" class="img-fluid mr-4">
                    </a>
                    <a href="#">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/bi_twitter.svg"
                            alt="twitter" class="img-fluid mr-4">
                    </a>
                    <a href="#">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/bi_instagram.svg"
                            alt="twitch" class="img-fluid mr-4">
                    </a>
                </div>
                <div class="copyright font-red-hat-display">
                    2021 All rights reserved.
                </div>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="row col-md-6 nav-footer">
                <div class="col-md-4 mb-md-0 mb-3">
                    <p>
                        Features
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Payments</a>
                        </li>
                        <li>
                            <a href="#!">Collections</a>
                        </li>
                        <li>
                            <a href="#!">Conversions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-md-0 mb-3">
                    <p>
                        Resources
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Blog</a>
                        </li>
                        <li>
                            <a href="#!">FAQ</a>
                        </li>
                        <li>
                            <a href="#!">Partnerships</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-md-0 mb-3">
                    <p>
                        Our Company
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">About Us</a>
                        </li>
                        <li>
                            <a href="#!">Careers</a>
                        </li>
                        <li>
                            <a href="#!">News & Media</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
  </html>