<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Ferroviaria Oriental</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/welcome2/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/welcome2/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('assets/welcome2/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('assets/welcome2/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/welcome2/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{asset('assets/welcome2/images/loading.gif')}}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="{{asset("assets/welcome2/images/logo.png")}}"
                                            alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                @if (Route::has('login'))
                                 <ul class="navbar-nav mr-auto">
                                       @auth
                                       {{-- <li class="nav-item"> --}}
                                       <div class="sign_btn">
                                          <a class="" href="{{ url('/administracion') }}"> Inicio </a>
                                       </div>
                                       {{-- </li> --}}
                                       @else
                                          <div class="sign_btn"><a href="{{ route('login') }}">Ingresar</a></div>
                                       @if (Route::has('register'))
                                          <div class="sign_btn"><a class="bg-dark text-light ml-2" href="{{ route('register') }}">Registrarse</a></div>
                                       @endif
                                       @endauth

                                 </ul>
                                @endif
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-12">
                    <div class="text-bg">
                        <h1>FERROVIARIA ORIENTAL</h1>
                        <strong>Transporte por ferrocarril</strong>
                        <span>Uniendo el oriente boliviano</span>
                        <p>
                            Somos una empresa de soluciones logísticas integrales y el operador de la red ferroviaria
                            occidental de Bolivia.

                            <head></head>
                        </p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- end banner -->
    <!-- car -->

    {{-- <div  class="car">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>VARIETY OF CARS </h2>
                     <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="{{asset('assets/welcome2/images/car_img1.png')}}" alt="#"/></figure>
    <h3>Hundai</h3>
    </div>
    </div>
    <div class="col-md-4 padding_leri">
        <div class="car_box">
            <figure><img src="{{ asset('assets/welcome2/images/car_img2.png') }}" alt="#" /></figure>
            <h3>Audi</h3>
        </div>
    </div>
    <div class="col-md-4 padding_leri">
        <div class="car_box">
            <figure><img src="{{ asset('assets/welcome2/images/car_img3.png') }} " alt="#" /></figure>
            <h3>Bmw x5</h3>
        </div>
    </div>
    </div>
    </div>
    </div> --}}

    <!-- end car -->
    <!-- bestCar -->

    {{-- <div id="contact" class="bestCar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-md-6 offset-md-6">
                        <form class="main_form">
                           <div class="titlepage">
                              <h2>Find A  Best Car For Rent</h2>
                           </div>
                           <div class="row">
                              <div class="col-md-12 ">
                                 <select>
                                    <option value="0">Choose car Make</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-md-12">
                                 <select>
                                    <option value="0">Choose Car Type </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-md-12">
                                 <input class="contactus" placeholder="Search" type="Search" name="Search">                          
                              </div>
                              <div class="col-md-12">
                                 <select>
                                    <option value="0">Price of Rent</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-sm-12">
                                 <button class="find_btn">Find Now</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}

    <!-- end bestCar -->
    <!-- choose  section -->


    {{-- <div class="choose ">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Why Choose Us</h2>
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when<br> looking at its layout. The point of using </span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="choose_box">
                     <span>01</span>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making </p>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="choose_box">
                     <span>02</span>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making </p>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="choose_box">
                     <span>03</span>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making </p>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}

    <!-- end choose  section -->
    <!-- cutomer -->

    {{-- <div class="cutomer">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>What is says our cutomer</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide cutomer_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="cross_img">
                                    <figure><img src="{{asset('assets/welcome2/images/cross_img.png')}}" alt="#"/>
    </figure>
    </div>
    <div class="our cross_layout">
        <div class="test_box">
            <h4>Due markes</h4>
            <span>Rental</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
            <i><img src="{{asset('assets/welcome2/images/te1.png')}}" alt="#" /></i>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="carousel-item">
        <div class="container">
            <div class="carousel-caption">
                <div class="cross_img">
                    <figure><img src="{{asset('assets/welcome2/images/cross_img.png')}}" alt="#" /></figure>
                </div>
                <div class="our cross_layout">
                    <div class="test_box">
                        <h4>Due markes</h4>
                        <span>Rental</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit ess</p>
                        <i><img src="{{asset('assets/welcome2/images/te1.png')}}" alt="#" /></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="container">
            <div class="carousel-caption">
                <div class="cross_img">
                    <figure><img src="{{asset('assets/welcome2/images/cross_img.png')}}" alt="#" /></figure>
                </div>
                <div class="our cross_layout">
                    <div class="test_box">
                        <h4>Due markes</h4>
                        <span>Rental</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit ess</p>
                        <i><img src="{{asset('assets/welcome2/images/te1.png')}}" alt="#" /></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    </div>
    </div>
    </div>
    </div> --}}

    <!-- end cutomer -->
    <!--  footer -->

    <footer>
        <div class="footer">
            {{-- <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="cont_call">
                        <h3> <strong class="multi color_chang"> Call Now</strong><br>
                           (+1) 12345667890
                        </h3>
                     </div>
                     <div class="cont">
                        <h3> <strong class="multi"> Free Multipurpose</strong> 
                           Responsive Landing Page 2019
                        </h3>
                     </div>
                  </div>
               </div>
            </div> --}}
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2021 Ferroviaria Oriental <a href="https://html.design/"> </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{asset('assets/welcome2/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/welcome2/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/welcome2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/welcome2/js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('assets/welcome2/js/plugin.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('assets/welcome2/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/welcome2/js/custom.js')}}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>