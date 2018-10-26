<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Varela+Round') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">


</head>
<body id="page-top">
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
          <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              Menu
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#about">Rólunk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#projects">Szállítások</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#contact">Kapcsolat</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        @if(Session::has('success_message'))
          <div class="alert alert-success fixed-top">
              <span class="glyphicon glyphicon-ok"></span>
              {!! session('success_message') !!}

              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
              </button>

          </div>
        @endif

        <!-- Header -->
        <header class="masthead">
          
        </header>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <!--ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol-->
          <div class="carousel-inner">
            @foreach ($productTypes as $productType)
                <div class="carousel-item {{ ($productType->id == 1) ? 'active' : '' }}">
                    <div class="carousel-caption">
                        <h2>{{ $productType->getRenderValue() }}</h2>
                        <br>
                        <h3>Ár: {{ $productType->average_price }}</h3>
                        <a href="{{ url('orders/createWithBuyer') }}/{{ $productType->id }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Rendel</span>
                        </a>
                        <br>
                        Leírás: {{ $productType->description }}
                    </div>
                    <img class="d-block w-100" src="{{ url('img/ipad.png') }}">
                </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <!-- About Section -->
        <section id="about" class="about-section text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <h2 class="text-white mb-4">Built with Bootstrap 4</h2>
                <p class="text-white-50">Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                  <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
              </div>
            </div>
            <img src="img/ipad.png" class="img-fluid" alt="">
          </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="projects-section bg-light">
          <div class="container">

            <!-- Featured Project Row -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
              <div class="col-xl-8 col-lg-7">
                <img class="img-fluid mb-3 mb-lg-0" src="img/bg-masthead.jpg" alt="">
              </div>
              <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                  <h4>Shoreline</h4>
                  <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any project - even commercial projects! Download it, customize it, and publish your website!</p>
                </div>
              </div>
            </div>

            <!-- Project One Row -->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
              <div class="col-lg-6">
                <img class="img-fluid" src="img/demo-image-01.jpg" alt="">
              </div>
              <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                  <div class="d-flex h-100">
                    <div class="project-text w-100 my-auto text-center text-lg-left">
                      <h4 class="text-white">Misty</h4>
                      <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                      <hr class="d-none d-lg-block mb-0 ml-0">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Project Two Row -->
            <div class="row justify-content-center no-gutters">
              <div class="col-lg-6">
                <img class="img-fluid" src="img/demo-image-02.jpg" alt="">
              </div>
              <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                  <div class="d-flex h-100">
                    <div class="project-text w-100 my-auto text-center text-lg-right">
                      <h4 class="text-white">Mountains</h4>
                      <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                      <hr class="d-none d-lg-block mb-0 mr-0">
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section bg-black">
          <div class="container">

            <div class="row">

              <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                  <div class="card-body text-center">
                    <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                    <div class="text-black mb-2"><a href="{{ url('/termsAndConditions') }}">Általános felhasználási feltételek</a></div>
                    <div class="text-black mb-2"><a href="http://www.anpc.gov.ro">ANPC</a></div>
                    <div class="text-black mb-2"><a href="{{ url('/privateDataProtectionDescription') }}">Személyes adatok védelme</a></div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                  <div class="card-body text-center">
                    <i class="fas fa-envelope text-primary mb-2"></i>
                    <h4 class="text-uppercase m-0">Facebook</h4>
                    <hr class="my-4">
                    <div class="small text-black-50">
                      <a href="#">hello@yourdomain.com</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                  <div class="card-body text-center">
                    <i class="fas fa-mobile-alt text-primary mb-2"></i>
                    <h4 class="text-uppercase m-0">Telefon</h4>
                    <hr class="my-4">
                    <div class="small text-black-50">+1 (555) 902-8832</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        
        <!-- Footer -->
        <footer class="bg-black small text-center text-white-50">
          
        </footer>
    </div>

    @include('cookieConsent::index')

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/grayscale.min.js') }}"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            console.log('as')
            $('#carouselExampleIndicators').carousel()
        })
    </script>

</body>
</html>
